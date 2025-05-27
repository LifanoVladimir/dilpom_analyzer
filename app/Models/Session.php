<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_time',
        'duration',
    ];

    public $timestamps = true;

    public function accessPoints()
    {
        return $this->hasMany(AccessPoint::class);
    }
}
