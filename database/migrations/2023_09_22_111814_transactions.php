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
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('booking_id'); // Foreign key referencing booking table
            $table->foreign('booking_id')->references('id')->on('bookings');
            $table->string('transaction_ref')->unique(); // Reference from Paystack or similar gateway
            $table->string('authorization_code')->nullable(); // Optional depending on gateway specifics
            $table->string('status')->default('pending'); // "success", "failed", "cancelled", etc.
            $table->decimal('amount', 10, 2); // Transaction amount in currency used for booking
            $table->string('currency')->default('NGN'); // Currency code (adjust based on your use case)
            $table->text('metadata')->nullable(); // Additional data from the payment gateway
            $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_transactions');
        //
    }
};
