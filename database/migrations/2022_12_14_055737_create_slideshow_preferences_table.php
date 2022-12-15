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
            $table->foreignId('video_sample_id')->nullable();
            $table->foreignId('ilm_sample_id')->nullable();
            $table->foreignId('package_sample_id')->nullable();
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
