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
        Schema::create('costumes', function (Blueprint $table) {
    $table->id('costume_id');
    $table->string('name');
    $table->string('character');
    $table->string('size');
    $table->integer('stock');
    $table->decimal('price', 12, 2);
    $table->text('description')->nullable();
    $table->string('image')->nullable();
    $table->foreignId('category_id')->constrained('categories', 'category_id');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('costumes');
    }
};
