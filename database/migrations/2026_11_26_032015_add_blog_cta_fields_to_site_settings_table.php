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
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('blog_cta_badge')->nullable()->after('blog_page_subtitle');
            $table->string('blog_cta_title')->nullable()->after('blog_cta_badge');
            $table->text('blog_cta_subtitle')->nullable()->after('blog_cta_title');
            $table->string('blog_cta_button_text')->nullable()->after('blog_cta_subtitle');
            $table->text('blog_cta_whatsapp_message')->nullable()->after('blog_cta_button_text');
        });

        DB::table('site_settings')
            ->whereNull('blog_cta_title')
            ->update([
                'blog_cta_badge' => 'SHINDO AFTERSALES & SALES',
                'blog_cta_title' => 'Butuh Konsultasi Armada Truk SHACMAN?',
                'blog_cta_subtitle' => 'Diskusikan kebutuhan unit dump truck, tronton, atau suku cadang resmi untuk operasional proyek Anda.',
                'blog_cta_button_text' => 'Hubungi Kami',
                'blog_cta_whatsapp_message' => null,
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'blog_cta_badge',
                'blog_cta_title',
                'blog_cta_subtitle',
                'blog_cta_button_text',
                'blog_cta_whatsapp_message',
            ]);
        });
    }
};
