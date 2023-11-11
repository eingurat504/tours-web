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
        Schema::create('payment_logs', function (Blueprint $table) {
            $table->id();
            $table->string('mode_of_payment')->nullable();
            $table->foreignId('booking_id');
            $table->foreignId('payment_id');
            $table->integer('status');
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('reserved_at')->nullable();
            $table->timestamp('revoked_at')->nullable();
            $table->integer('amount')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('payment_logs');
    }
};
