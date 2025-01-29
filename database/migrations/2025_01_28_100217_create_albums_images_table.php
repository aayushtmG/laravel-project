<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Create the Albums table
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Album name
            $table->string('thumbnail_image'); // Thumbnail image for the album
            $table->timestamps(); // Created and updated timestamps
        });

        // Create the Images table
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('album_id')->constrained('albums')->onDelete('cascade'); // Link to the albums table
            $table->string('image_path'); // Path to the image
            $table->string('title')->nullable(); // Optional image title
            $table->text('description')->nullable(); // Optional image description
            $table->timestamps(); // Created and updated timestamps
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('images');
        Schema::dropIfExists('albums');
    }
};

