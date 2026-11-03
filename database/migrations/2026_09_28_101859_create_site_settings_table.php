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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->default('SHINDO - Official SHACMAN Distributor');
            $table->string('navbar_logo')->nullable()->default('homepage/shacman-shindo-white.png');
            $table->string('cta_text')->default('Hubungi Kami');
            $table->string('cta_url')->default('/kontak');
            $table->json('nav_items')->nullable();

            $table->string('footer_logo')->nullable()->default('homepage/shindo-logo-white.png');
            $table->text('footer_description')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('youtube_url')->nullable();

            $table->string('office_address')->nullable();
            $table->string('office_phone')->nullable();
            $table->string('office_email')->nullable();
            $table->string('office_hours')->nullable();
            $table->string('mechanic_hours')->nullable();
            $table->string('copyright_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
