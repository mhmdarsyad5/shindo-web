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
        // 1. ABOUT US PAGE SETTING
        Schema::create('about_settings', function (Blueprint $table) {
            $table->id();
            // Hero Section
            $table->string('hero_badge')->nullable();
            $table->string('hero_title')->nullable();
            $table->string('hero_subtitle')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('hero_image')->nullable();

            // Profile / Authorized Dealer Section
            $table->string('profile_title')->nullable();
            $table->text('profile_description')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('profile_cta_text')->nullable();
            $table->string('profile_cta_url')->nullable();

            // Visi & Misi
            $table->string('vision_badge')->nullable();
            $table->string('vision_title')->nullable();
            $table->text('vision_text')->nullable();
            $table->string('mission_badge')->nullable();
            $table->string('mission_title')->nullable();
            $table->json('mission_items')->nullable();

            // SHASS Aftersales Section
            $table->string('shass_badge')->nullable();
            $table->string('shass_title')->nullable();
            $table->text('shass_subtitle')->nullable();
            $table->json('shass_items')->nullable();

            // Branch Map Section
            $table->string('branches_badge')->nullable();
            $table->string('branches_title')->nullable();
            $table->text('branches_subtitle')->nullable();
            $table->string('branches_map_image')->nullable();

            // Long Term Commitment Section
            $table->string('commitment_title')->nullable();
            $table->text('commitment_subtitle')->nullable();
            $table->string('commitment_image')->nullable();
            $table->json('commitment_items')->nullable();

            $table->timestamps();
        });

        // 2. SERVICES PAGE SETTING
        Schema::create('service_settings', function (Blueprint $table) {
            $table->id();
            // Hero
            $table->string('hero_badge')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_subtitle')->nullable();

            // Keunggulan Operasional Section
            $table->string('advantages_badge')->nullable();
            $table->string('advantages_title')->nullable();
            $table->text('advantages_subtitle')->nullable();
            $table->json('advantages_items')->nullable();

            // Banner Bawah
            $table->string('banner_image')->nullable();

            $table->timestamps();
        });

        // 3. SPAREPARTS PAGE SETTING
        Schema::create('spareparts_settings', function (Blueprint $table) {
            $table->id();
            // Hero
            $table->string('hero_badge')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_subtitle')->nullable();

            // Pilar Jaminan
            $table->json('pillars_items')->nullable();

            // Warehouse & Delivery Section
            $table->string('warehouse_badge')->nullable();
            $table->string('warehouse_title')->nullable();
            $table->text('warehouse_subtitle')->nullable();
            $table->text('warehouse_description')->nullable();
            $table->string('warehouse_image')->nullable();
            $table->json('warehouse_points')->nullable();

            // Support Mekanik 24/7 Section
            $table->string('mechanic_badge')->nullable();
            $table->string('mechanic_title')->nullable();
            $table->text('mechanic_subtitle')->nullable();
            $table->json('mechanic_points')->nullable();

            // CTA / WA Order
            $table->string('cta_title')->nullable();
            $table->text('cta_subtitle')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('whatsapp_button_text')->nullable();
            $table->text('whatsapp_message')->nullable();

            $table->timestamps();
        });

        // 4. CONTACT PAGE SETTING
        Schema::create('contact_settings', function (Blueprint $table) {
            $table->id();
            // Hero
            $table->string('hero_badge')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_subtitle')->nullable();

            // Info Detail Kontak
            $table->string('office_title')->nullable();
            $table->string('office_address')->nullable();
            $table->string('office_phone')->nullable();
            $table->string('office_email')->nullable();
            $table->string('office_hours')->nullable();
            $table->string('mechanic_hours')->nullable();

            // Map Embed & External Link
            $table->text('map_embed_url')->nullable();
            $table->string('map_link_url')->nullable();

            // Form Section
            $table->string('form_title')->nullable();
            $table->text('form_subtitle')->nullable();
            $table->string('submit_button_text')->nullable();
            $table->string('submit_notice_text')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_settings');
        Schema::dropIfExists('spareparts_settings');
        Schema::dropIfExists('service_settings');
        Schema::dropIfExists('about_settings');
    }
};
