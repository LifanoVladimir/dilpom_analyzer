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
        'user_id'
    ];

    public $timestamps = true;

    public function accessPoints()
    {
        return $this->hasMany(AccessPoint::class);
    }
    public function user()
{
    return $this->belongsTo(User::class);
}
}
