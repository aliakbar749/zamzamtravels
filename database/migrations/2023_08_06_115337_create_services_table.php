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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->integer('service_category_id')->default(0);
            $table->integer('serial');
            $table->string('url')->index();
            $table->string('title');
            $table->string('subtitle');
            $table->string('pdf_file')->nullable();
            $table->longText('package_overview')->nullable();
            $table->longText('itinerary')->nullable();
            $table->longText('notes_and_policy')->nullable();
            $table->longText('package_pricing')->nullable();
            $table->string('video_link')->nullable();
            $table->string('start_price')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->string('image')->nullable();
            $table->string('breadcrumb_image')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('is_popular')->default(0);
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('tags')->nullable();
            $table->integer('views')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
