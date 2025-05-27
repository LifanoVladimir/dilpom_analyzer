<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessPoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'AP_name',
        'channel',
        'datetime_ap_scan',
        'signal_level',
        'speed_diapozon',
        'shifr_type',
        '802_11_support',
        'ABG_support',
        'AG_support',
        'max_speed',
        'hidden_ssid',
        'session_id',
    ];

    public function session()
    {
        return $this->belongsTo(Session::class);
    }
}
