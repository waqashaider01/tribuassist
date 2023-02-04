<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slideshow_preferences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tribute_id');
            $table->foreignId('style_id')->nullable();
            $table->foreignId('theme_id')->nullable();
            $table->foreignId('music1_id')->nullable();
            $table->foreignId('music2_id')->nullable();
            $table->foreignId('music3_id')->nullable();
            $table->foreignId('music4_id')->nullable();
            $table->foreignId('music5_id')->nullable();
            $table->foreignId('package_theme_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slideshow_preferences');
    }
};
