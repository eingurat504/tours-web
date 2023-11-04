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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_no')->unique();
            $table->string('traveller_name');
            $table->string('traveller_phone_no');
            $table->string('traveller_flight_no')->nullable();
            $table->foreignId('package_id')->nullable();
            $table->string('activity_ids', 255);
            $table->integer('no_of_adults')->nullable();
            $table->string('status');
            $table->integer('no_of_children')->nullable();
            $table->integer('no_of_people')->nullable();
            $table->timestamp('from_date')->nullable();
            $table->timestamp('to_date')->nullable();
            $table->unsignedInteger('total_amount')->nullable();
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
        Schema::dropIfExists('bookings');
    }
};
