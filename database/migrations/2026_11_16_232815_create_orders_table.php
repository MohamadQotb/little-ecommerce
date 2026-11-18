<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->foreignId('user_id')->constrained()->restrictOnDelete();
            $table->enum('status', ["pending", "processing", "shipped", "delivered", "cancelled"])->default('pending');
            $table->string('recipient_name', 100);
            $table->string('phone', 30);
            $table->string('shipping_city', 100);
            $table->string('shipping_address', 255);
            $table->string('payment_method', 30)->default('cash_on_delivery');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('shipping_cost', 10, 2)->default(50.0);
            $table->decimal('total', 10, 2);
            $table->timestamps();
        });
        DB::statement('ALTER TABLE orders ADD CONSTRAINT chk_order_amounts CHECK (subtotal >= 0 AND shipping_cost >= 0 AND total = subtotal + shipping_cost)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
