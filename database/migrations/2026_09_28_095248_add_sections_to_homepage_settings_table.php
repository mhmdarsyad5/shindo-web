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
        Schema::table('homepage_settings', function (Blueprint $table) {
            // Showroom / Seri Truk Unggulan
            $table->string('showroom_badge')->nullable()->default('SERI TRUK UNGGULAN');
            $table->string('showroom_title')->nullable()->default('PILIHAN ARMADA TERBAIK UNTUK SEGALA KEBUTUHAN');
            $table->text('showroom_subtitle')->nullable();
            $table->json('truck_series')->nullable();

            // Tentang Kami
            $table->string('about_badge')->nullable()->default('TENTANG KAMI');
            $table->string('about_title')->nullable()->default('KOMITMEN KAMI UNTUK EFISIENSI & PERFORMA TINGGI');
            $table->text('about_description_1')->nullable();
            $table->text('about_description_2')->nullable();
            $table->string('about_image')->nullable();
            $table->json('about_features')->nullable();

            // Produk Unggulan
            $table->string('products_badge')->nullable()->default('PRODUK UNGGULAN KAMI');
            $table->string('products_title')->nullable()->default('LINI TERBAIK DUMP TRUCK SHACMAN');
            $table->text('products_subtitle')->nullable();
            $table->json('product_cards')->nullable();

            // Keunggulan Operasional
            $table->string('advantages_badge')->nullable()->default('KEUNGGULAN OPERASIONAL');
            $table->string('advantages_title')->nullable()->default('MENGAPA MEMILIH SHACMAN?');
            $table->text('advantages_subtitle')->nullable();
            $table->json('advantages_items')->nullable();

            // Layanan
            $table->string('services_badge')->nullable()->default('LAYANAN');
            $table->string('services_title')->nullable()->default('DUKUNGAN PENUH UNTUK BISNIS ANDA');
            $table->text('services_subtitle')->nullable();
            $table->json('services_items')->nullable();

            // Blog / Artikel
            $table->string('blog_badge')->nullable()->default('ARTIKEL');
            $table->string('blog_title')->nullable()->default('BLOG TERBARU');
            $table->text('blog_subtitle')->nullable();
            $table->json('blog_items')->nullable();

            // CTA Banner
            $table->string('cta_banner_title')->nullable()->default('SIAP MEMILIKI DUMP TRUCK SHACMAN ANDA?');
            $table->text('cta_banner_subtitle')->nullable();
            $table->string('cta_banner_bg_image')->nullable();
            $table->string('whatsapp_number')->nullable()->default('628123456789');
            $table->string('whatsapp_text')->nullable()->default('Hubungi via WhatsApp');
            $table->string('brochure_text')->nullable()->default('Dapatkan Brosur Unit');
            $table->string('brochure_url')->nullable()->default('#kontak');

            // Footer
            $table->string('footer_logo')->nullable();
            $table->text('footer_description')->nullable();
            $table->string('facebook_url')->nullable()->default('https://facebook.com');
            $table->string('instagram_url')->nullable()->default('https://instagram.com');
            $table->string('linkedin_url')->nullable()->default('https://linkedin.com');
            $table->string('youtube_url')->nullable()->default('https://youtube.com');
            $table->string('office_address')->nullable()->default('THC 59 Kamal Jakut');
            $table->string('office_phone')->nullable()->default('(021) 555-8321');
            $table->string('office_email')->nullable()->default('sales@shindo.id');
            $table->string('office_hours')->nullable()->default('Senin - Jumat, 09:00 - 17:00');
            $table->string('mechanic_hours')->nullable()->default('Siaga Darurat 24 Jam');
            $table->string('copyright_text')->nullable()->default('Copyright © PT Shindo Tractors Adiperkasa, 2026, All Right Reserved.');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homepage_settings', function (Blueprint $table) {
            $table->dropColumn([
                'showroom_badge',
                'showroom_title',
                'showroom_subtitle',
                'truck_series',
                'about_badge',
                'about_title',
                'about_description_1',
                'about_description_2',
                'about_image',
                'about_features',
                'products_badge',
                'products_title',
                'products_subtitle',
                'product_cards',
                'advantages_badge',
                'advantages_title',
                'advantages_subtitle',
                'advantages_items',
                'services_badge',
                'services_title',
                'services_subtitle',
                'services_items',
                'blog_badge',
                'blog_title',
                'blog_subtitle',
                'blog_items',
                'cta_banner_title',
                'cta_banner_subtitle',
                'cta_banner_bg_image',
                'whatsapp_number',
                'whatsapp_text',
                'brochure_text',
                'brochure_url',
                'footer_logo',
                'footer_description',
                'facebook_url',
                'instagram_url',
                'linkedin_url',
                'youtube_url',
                'office_address',
                'office_phone',
                'office_email',
                'office_hours',
                'mechanic_hours',
                'copyright_text',
            ]);
        });
    }
};
