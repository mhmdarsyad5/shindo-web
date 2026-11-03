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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('truck_series_id')->nullable()->constrained('truck_series')->nullOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('type')->nullable();
            $table->string('badge')->nullable();
            $table->string('drive')->nullable();
            $table->string('engine')->nullable();
            $table->string('capacity')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->string('detail_url')->nullable()->default('/produk');
            $table->string('whatsapp_message')->nullable();
            $table->boolean('is_featured')->default(true);
            $table->boolean('is_active')->default(true);
            $table->integer('order_column')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
