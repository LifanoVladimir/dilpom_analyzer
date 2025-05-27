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
         Schema::create('access_points', function (Blueprint $table) {
            $table->id();
            $table->string('AP_name');
            $table->integer('channel');
            $table->dateTime('datetime_ap_scan');
            $table->integer('signal_level');
            $table->string('speed_diapozon');
            $table->string('shifr_type');
            $table->boolean('802_11_support');
            $table->boolean('ABG_support');
            $table->boolean('AG_support');
            $table->string('max_speed');
            $table->boolean('hidden_ssid');
            $table->foreignId('session_id')->constrained('sessions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('access_points');
    }
};
