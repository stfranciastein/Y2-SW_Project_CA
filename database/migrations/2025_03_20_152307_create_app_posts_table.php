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
        Schema::create('app_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign Key to Users
            $table->text('description')->nullable();
            $table->text('content'); // Content of the post
            $table->enum('category', ['news', 'event', 'announcement'])->default('news'); //Remember to store this as enum but retrieve it as a string.
            $table->text('image_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_posts');
    }
};
