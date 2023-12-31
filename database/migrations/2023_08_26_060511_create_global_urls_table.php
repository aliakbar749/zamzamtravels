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
        Schema::create('global_urls', function (Blueprint $table) {
            $table->id();
            $table->integer('tracking_id')->index();
            $table->string('track');
            $table->string('url')->unique();
            $table->string('image')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('global_urls');
    }
};
