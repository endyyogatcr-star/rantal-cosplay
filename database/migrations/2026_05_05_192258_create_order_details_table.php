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
        Schema::create('order_details', function (Blueprint $table) {
    $table->id('detail_id');
    $table->foreignId('order_id')->constrained('orders', 'order_id');
    $table->foreignId('costume_id')->constrained('costumes', 'costume_id');
    $table->date('start_date');
    $table->date('end_date');
    $table->decimal('total_price', 12, 2);
    $table->enum('status', ['active', 'returned']);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
