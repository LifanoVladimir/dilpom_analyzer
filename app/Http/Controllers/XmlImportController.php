<?php

namespace App\Http\Controllers;

use App\Models\AccessPoint;
use App\Models\Session;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

class XmlImportController extends Controller
{
    public function form()
    {
        return view('import');
    }

    public function upload(Request $request)
    {
        $request->validate([
         'files.*' => 'required|file|mimes:xml',
        ]);
        
        $sessionsId = [];

        foreach ($request->file('files') as $file) {
            $xml = simplexml_load_file($file->getRealPath());
            $epoch2000 = 946684800;

            $session = new Session();
            $session->date_time = date('Y-m-d H:i:s', $epoch2000 + (int) $xml->DateTime);
            $session->duration = (int) $xml->Duration;
            $session->user_id = auth()->id();

            
            $existingSession = Session::where('date_time', $session->date_time)
                ->where('duration', $session->duration)
                ->where('user_id', $session->user_id)
                ->first();

            if ($existingSession) {
                continue;
            }    
            $session->save();
            $sessionId = $session->id;

            $accessPoints = $xml->xpath('//APFound');;
            foreach($accessPoints as $accessPoint){
                $ap = new AccessPoint([
                    'AP_name' => $this->hexToAscii($accessPoint->S),
                    'channel' => intval(((int)$accessPoint->CH) / 5 - 2407),
                    'datetime_ap_scan' => date('Y-m-d H:i:s', $epoch2000 + (int) $accessPoint->FH),
                    'signal_level' => (int)$accessPoint->LS,
                    'speed_diapozon' =>  (string)$accessPoint->SR,
                    'shifr_type' =>  (string)$accessPoint->SEC,
                    '802_11_support' =>  (bool)$accessPoint->F4,
                    'ABG_support' => (bool)$accessPoint->ABG,
                    'AG_support' =>  (bool)$accessPoint->AG,
                    'max_speed' => (string)$accessPoint->X,
                    'hidden_ssid' =>  (bool)$accessPoint->H,
                ]);
                
                $session->accessPoints()->save($ap);                
            }            
            $sessionsId[] = $sessionId;
        }

        return redirect()->route('reports.index');
    }

    function hexToAscii(string $hex): string
    {
        $ascii = '';
        // Разбиваем строку на байты (по 2 символа)
        for ($i = 0; $i < strlen($hex); $i += 2) {
            $byte = substr($hex, $i, 2);
            // Преобразуем hex байт в символ
            $ascii .= chr(hexdec($byte));
        }
        return $ascii;
    }
    


}
