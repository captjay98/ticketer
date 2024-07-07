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
            'seats',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('seat_number');
                $table->string('seat_position')->nullable();
                $table->foreignId('trip_id')->onDelete('cascade');
                $table->foreignId('coach_id');
                $table->string('status')->default('available')->enum('available', 'reserved', 'booked');
                $table->timestamps();
            }
        );
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
