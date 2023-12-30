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
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->integer('seat_id')->nullable();
            $table->integer('ticket_type_id')->nullable();
            $table->integer('trip_id')->nullable();
            $table->uuid('serial_number')->nullable();
            $table->string('expires_at')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('seat_id')->references('id')->on('seats');
            $table->foreign('trip_id')->references('id')->on('trips');
            $table->foreign('ticket_type_id')->references('id')->on('ticket_types');
            $table->unique(['seat_id', 'trip_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
