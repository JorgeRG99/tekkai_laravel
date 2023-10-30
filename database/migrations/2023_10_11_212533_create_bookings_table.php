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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userID')->nullable();
            $table->unsignedBigInteger('customerID')->nullable();
            $table->unsignedBigInteger('tableID');
            $table->unsignedBigInteger('scheduleID');
            $table->timestamps();

            $table->foreign('userID')->references('id')->on('users');
            $table->foreign('customerID')->references('id')->on('customers');
            $table->foreign('tableID')->references('id')->on('tables');
            $table->foreign('scheduleID')->references('id')->on('schedules');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
