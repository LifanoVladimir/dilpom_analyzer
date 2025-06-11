<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MeasurementPoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'floor_plan_id',
        'x',
        'y',
        'signal_strength',
    ];

    /**
     * Связь: точка принадлежит плану.
     */
    public function floorPlan()
    {
        return $this->belongsTo(FloorPlan::class);
    }
}
