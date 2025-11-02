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
        Schema::create('downloads', function (Blueprint $table) {
            $table->id();
            $table->longText('content');
            $table->timestamps();
        });
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->longText('content');
            $table->timestamps();
        });
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->longText('content');
            $table->timestamps();
        });
        Schema::create('downloads', function (Blueprint $table) {
            $table->id();
            $table->longText('content');
            $table->timestamps();
        });
        Schema::create('downloads', function (Blueprint $table) {
            $table->id();
            $table->longText('content');
            $table->timestamps();
        });
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->longText('content');
            $table->timestamps();
        });
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->longText('content');
            $table->timestamps();
        });
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('content');
            $table->timestamps();
        });
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->longText('content');
            $table->timestamps();
        });
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('video');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('downloads');
        Schema::dropIfExists('faqs');
        Schema::dropIfExists('products');
        Schema::dropIfExists('downloads');
        Schema::dropIfExists('downloads');
        Schema::dropIfExists('services');
        Schema::dropIfExists('settings');
        Schema::dropIfExists('teams');
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('videos');
    }
};
