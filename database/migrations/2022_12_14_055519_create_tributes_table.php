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

            // Visibility
            $table->boolean('status')->default(1)->comment('1:visible,0:hidden');
            $table->foreignId('funeral_home_id');

            // Data
            $table->string('internal_record_id')->nullable();
            $table->string('tribute_type')->default(0)->comment('0:human,1:pet');
            $table->string('password')->nullable();

            // Tribute Info
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birthday')->nullable();
            $table->date('deathday')->nullable();
            $table->text('message')->nullable();

            // Visitation/Service Info
            $table->string('visitation_announcement')->nullable();
            $table->string('service_announcement')->nullable();
            $table->date('current_service_start_at')->nullable();
            $table->date('current_service_end_at')->nullable();

            // Fulfillment Info - Flower delivery
            $table->string('delivery_address')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->string('phone')->nullable();

            // Fulfillment Info - Family Notification
            $table->string('notification_email')->nullable();
            $table->string('notification_phone')->nullable();

            // Generations
            $table->string('grandparents')->nullable();
            $table->string('parents')->nullable();
            $table->string('siblings')->nullable();
            $table->string('spouse')->nullable();
            $table->string('children')->nullable();
            $table->string('grandchildren')->nullable();

            // DVD
            $table->string('dvd_product_id')->nullable();

            $table->foreignId('created_by');
            $table->foreignId('updated_by')->nullable();

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
