<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('address');
            $table->string('area');
            $table->string('city')->default('London');
            $table->string('country')->default('UK');
            $table->unsignedTinyInteger('star_rating');
            $table->decimal('min_price', 8, 2);
            $table->decimal('rating', 3, 1);
            $table->unsignedInteger('review_count');
            $table->string('image_path');
            $table->string('image_alt');
            $table->json('amenities');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
