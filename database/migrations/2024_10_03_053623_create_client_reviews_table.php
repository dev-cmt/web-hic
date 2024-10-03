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
        Schema::create('client_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('img_path')->nullable(); // Allow null for image path
            $table->string('name')->nullable(); // Allow null for name
            $table->string('designation')->nullable(); // Allow null for designation
            $table->text('description')->nullable(); // Allow null for description
            $table->enum('status', ['active', 'inactive'])->default('inactive'); // Default value for status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_reviews');
    }
};
