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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->decimal('total', 8, 2);
            $table->enum('status', ['pending', 'cancelled', 'on delivery', 'processed', 'delivered'])->default('pending');
            $table->decimal('shipping_cost', 8, 2);
            $table->decimal('shipping_method', 8, 2);
            $table->boolean('is_paid')->default(false);
            $table->foreignId('address_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
