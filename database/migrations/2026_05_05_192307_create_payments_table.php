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
        Schema::create('payments', function (Blueprint $table) {
    $table->id('payment_id');
    $table->foreignId('order_id')->constrained('orders', 'order_id');
    $table->dateTime('payment_date');
    $table->decimal('amount', 12, 2);
    $table->string('payment_method');
    $table->decimal('total_price', 12, 2);
    $table->enum('status', ['pending', 'paid', 'failed']);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
