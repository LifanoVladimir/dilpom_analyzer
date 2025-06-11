<?php

use App\Http\Controllers\FloorPlanController;
use App\Http\Controllers\HeatmapController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\XmlImportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/import', [XmlImportController::class, 'form'])->name('import.form');
Route::post('/import', [XmlImportController::class, 'upload'])->name('import.upload');

Route::get('/heatmap', [HeatmapController::class, 'form'])->name('heatmap.form');
Route::post('/heatmap', [HeatmapController::class, 'upload'])->name('heatmap.upload');

Route::get('/floor-plans', [FloorPlanController::class, 'show'])->name('floor-plans.show');

Route::get('/reports', [ReportController::class, 'index'])->name('reports.index')->middleware('auth');


require __DIR__.'/auth.php';
