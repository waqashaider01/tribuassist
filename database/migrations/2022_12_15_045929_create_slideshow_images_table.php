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
        Schema::create('slideshow_images', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_thumbnail')->default(false);
            $table->integer('serial_number')->nullable();
            $table->string('path')->nullable();
            $table->string('comment')->nullable();
            $table->foreignId('slideshow_id')->nullable();
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
        Schema::dropIfExists('slideshow_images');
    }
};
