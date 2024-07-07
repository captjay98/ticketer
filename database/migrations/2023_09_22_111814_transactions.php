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
            'transactions',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->foreignId('booking_id');
                $table->string('transaction_ref')->unique();
                $table->string('authorization_code')->nullable();
                $table->string('status')->default('pending');
                $table->string('amount');
                $table->string('currency')->default('NGN');
                $table->text('metadata')->nullable();
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
        Schema::dropIfExists('payment_transactions');
        //
    }
};
