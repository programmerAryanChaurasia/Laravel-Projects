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
        Schema::create('booked_orders', function (Blueprint $table) {
            $table->id();
            $table->string('card_holder_name');
            $table->string('card_number');
            $table->string('expiration');
            $table->string('cvv');
            $table->string('total_amount');
            $table->string('food_id');
            $table->string('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booked_orders');
    }
};
