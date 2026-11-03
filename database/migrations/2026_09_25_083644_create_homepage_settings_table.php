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
        Schema::create('homepage_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title')->default('SHACMAN Indonesia | Authorized Dealer SHINDO - Tangguh di Segala Medan');
            $table->text('meta_description')->nullable();

            // Navbar settings
            $table->string('navbar_logo')->nullable();
            $table->json('nav_items')->nullable();
            $table->string('cta_text')->default('Hubungi Kami');
            $table->string('cta_url')->default('#kontak');

            // Hero settings
            $table->string('hero_background_image')->nullable();
            $table->string('hero_logo')->nullable();
            $table->string('hero_tagline')->default('TANGGUH DI SEGALA MEDAN');

            // Bottom stats settings
            $table->json('stats')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_settings');
    }
};
