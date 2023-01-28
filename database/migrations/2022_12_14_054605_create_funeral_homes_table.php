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
        Schema::create('funeral_homes', function (Blueprint $table) {
            $table->id()->from(100001);
            $table->boolean('active_state')->default(true);
            $table->string('name');
            $table->string('street')->nullable();
            $table->string('city_id')->nullable();
            $table->string('state_id')->nullable();
            $table->string('zip')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->string('notification_email')->nullable();
            $table->string('doing_business_as')->nullable();
            $table->string('website')->nullable();
            $table->text('services')->nullable();
            $table->foreignId('user_id');
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
        Schema::dropIfExists('funeral_homes');
    }
};
