<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FloorPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_path',
    ];

    /**
     * Связь: один план — много точек.
     */
    public function measurementPoints()
    {
        return $this->hasMany(MeasurementPoint::class);
    }
}
