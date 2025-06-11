<?php

namespace App\Http\Controllers;

use App\Models\FloorPlan;
use Illuminate\Http\Request;

class FloorPlanController extends Controller
{
    public function show(FloorPlan $floorPlan)
    {
        $points = $floorPlan->measurementPoints()->get();
        return view('floor_plans.show', compact('floorPlan', 'points'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'floor_plan_id' => 'required|exists:floor_plans,id',
            'x' => 'required|numeric',
            'y' => 'required|numeric',
        ]);

        $point = \App\Models\MeasurementPoint::create([
            'floor_plan_id' => $request->floor_plan_id,
            'x' => $request->x,
            'y' => $request->y,
        ]);

        return response()->json(['success' => true, 'point' => $point]);
    }
}
