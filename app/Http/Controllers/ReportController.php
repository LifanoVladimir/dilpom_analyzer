<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $sessions = Session::where('user_id', auth()->id())
            ->orderBy('date_time', 'desc')
            ->with('accessPoints') 
            ->get();

        return view('reports', compact('sessions'));
    }
}
