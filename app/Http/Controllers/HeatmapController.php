<?php

namespace App\Http\Controllers;

use App\Models\FloorPlan;
use Illuminate\Http\Request;

class HeatmapController extends Controller
{
    public function form()
    {
        return view('heatmap');
    }
    
    public function upload(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'floor_image' => 'required|image|mimes:jpg,jpeg,png|max:5120', // до 5MB
        ]);

        $path = $request->file('floor_image')->store('floor_plans', 'public');

        $floorPlan = FloorPlan::create([
            'name' => $request->name,
            'image_path' => $path,
        ]);

        return redirect()
            ->route('floor-plans.show', $floorPlan)
            ->with('success', 'План этажа успешно загружен');
    }
}
