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
        Schema::create('user_emissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->unsignedInteger('baseline_food');
            $table->unsignedInteger('baseline_waste');
            $table->unsignedInteger('baseline_energy');
            $table->unsignedInteger('baseline_land');
            $table->unsignedInteger('baseline_air');
            $table->unsignedInteger('baseline_sea');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_emissions');
    }
};
