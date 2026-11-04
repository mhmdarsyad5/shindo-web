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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('company')->nullable();
            $table->string('truck_series')->nullable();
            $table->string('quantity')->nullable();
            $table->string('location')->nullable();
            $table->text('notes')->nullable();
            $table->string('source')->default('homepage');
            $table->string('status')->default('new'); // new, contacted, quoted, closed, cancelled
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
