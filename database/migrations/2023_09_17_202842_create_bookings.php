<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(
            'bookings',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->foreignId("user_id")->nullable();
                $table->foreignId("ticket_id")->nullable();
                $table->foreignId("seat_id")->nullable();
                $table->foreignId("trip_id")->nullable();
                $table->string("reference")->nullable();
                $table->string('status')->enum('pending', 'failed', 'succesful');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
