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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->enum('difficulty', ['easy', 'medium', 'hard']); // Controlled difficulty options
            $table->integer('impact_points'); // Impact points is the amount of 'points' you've earned. This is separate from reduction numbers.
            $table->text('image_url')->nullable();
            $table->unsignedSmallInteger('reduction_food')->default(0);
            $table->unsignedSmallInteger('reduction_waste')->default(0);
            $table->unsignedSmallInteger('reduction_energy')->default(0);
            $table->unsignedSmallInteger('reduction_land')->default(0);
            $table->unsignedSmallInteger('reduction_air')->default(0);
            $table->unsignedSmallInteger('reduction_sea')->default(0);
            $table->string('category')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
