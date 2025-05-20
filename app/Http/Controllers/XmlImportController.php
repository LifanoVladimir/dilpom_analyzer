<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    $allData = [];

    foreach ($request->file('files') as $file) {
        $xml = simplexml_load_file($file->getRealPath());

        $data = [
            'date_time' => (string) $xml->DateTime,
            'duration' => (string) $xml->Duration,
            'serial_number' => trim((string) $xml->DeviceUsed->SerialNumber),
            'ui_version' => (string) $xml->DeviceUsed->UIVersion,
            'profile_path' => (string) $xml->Profile->OriginalProfile,
            'ap_mac' => (string) $xml->Profile->AP->M,
            'ap_location' => (string) $xml->Profile->AP->V_C,
            'min_signal' => (string) $xml->Profile->SignalMetrics->MinSig,
            'tx_rate_green' => (string) $xml->Profile->SignalMetrics->TxRate->TxRtGreen,
        ];

        $allData[] = $data;
    }

    return view('import-result', ['data' => $allData]);
}


}
