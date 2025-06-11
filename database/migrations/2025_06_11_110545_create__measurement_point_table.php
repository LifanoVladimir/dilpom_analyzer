<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('measurement_points', function (Blueprint $table) {
            $table->id();
            $table->foreignId('floor_plan_id')->constrained();
            $table->float('x'); // координаты в %
            $table->float('y');
            $table->float('signal_strength')->nullable(); // или другие параметры
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_measurement_point');
    }
};
