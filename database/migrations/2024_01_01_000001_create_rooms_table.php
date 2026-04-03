<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('type'); // standard | deluxe | suite
            $table->text('description');
            $table->decimal('price_per_night', 8, 2);
            $table->unsignedTinyInteger('capacity');
            $table->string('bed_type');
            $table->unsignedSmallInteger('size_sqm');
            $table->json('amenities');
            $table->string('image_path');
            $table->string('image_alt');
            $table->boolean('is_available')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
