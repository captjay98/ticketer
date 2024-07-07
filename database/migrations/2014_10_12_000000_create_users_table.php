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
        Schema::create(
            'users',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('avatar')->nullable();
                $table->string('first_name');
                $table->string('last_name');
                $table->string('email')->unique();
                $table->string('phone_number')->unique();
                $table->string('account_type')->enum('customer', 'admin', 'staff', 'superuser');
                $table->boolean('is_active')->default(true);
                $table->boolean('is_superuser')->default(false);
                $table->boolean('is_admin')->default(false);
                $table->boolean('is_staff')->default(false);
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
