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
        Schema::create('tributes', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(false);
            $table->integer('order_number')->default(0);
            $table->string('record_id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->date('dob');
            $table->date('dod');
            $table->string('contact_name')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('password');
            $table->foreignId('funeral_home_id');
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
        Schema::dropIfExists('tributes');
    }
};
