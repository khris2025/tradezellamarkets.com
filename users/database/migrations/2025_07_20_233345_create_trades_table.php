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
        Schema::create('trades', function (Blueprint $table) {
            $table->id();
            $table->string('order');
            $table->string('type'); // Buy/Sell
            $table->string('symbol');
            $table->decimal('volume', 10, 2);
            $table->decimal('sl', 10, 2)->nullable(); // Stop Loss
            $table->decimal('tp', 10, 2)->nullable(); // Take Profit
            $table->decimal('profit', 15, 2)->nullable();
            $table->string('status'); // e.g., Open/Closed
            $table->string('transaction_id')->unique();
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trades');
    }
};
