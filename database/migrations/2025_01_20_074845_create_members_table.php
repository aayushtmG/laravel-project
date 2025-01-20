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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('contact')->default('+977 999999');
            $table->enum('department', ['management', 'board']);
            $table->string('image');
            $table->string('position');
            $table->timestamp('created_at')->useCurrent();
            $table->timeStamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
