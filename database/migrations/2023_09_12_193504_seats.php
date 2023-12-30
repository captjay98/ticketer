<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('seat_number');
            $table->string('seat_position')->nullable();
            $table->integer('trip_id');
            $table->integer('coach_id');
            $table->string('status')->default('available')->enum('available', 'reserved', 'booked');
            $table->foreign('trip_id')->references('id')->on('trips');
            $table->foreign('coach_id')->references('id')->on('coaches');
            $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seats');
        //
    }
};
