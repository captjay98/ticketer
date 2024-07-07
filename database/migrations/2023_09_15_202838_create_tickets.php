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
            'tickets',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->uuid('serial_number')->nullable();
                $table->string('expires_at')->nullable();
                $table->foreignId('user_id')->nullable();
                $table->foreignId('seat_id')->nullable();
                $table->foreignId('trip_id')->nullable();
                $table->foreignId('ticket_type_id')->nullable();
                $table->unique(['seat_id', 'trip_id']);
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
