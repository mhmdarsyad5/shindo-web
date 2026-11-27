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
            $table->string('products_page_title')->nullable()->after('copyright_text');
            $table->text('products_page_subtitle')->nullable()->after('products_page_title');
            $table->string('blog_page_title')->nullable()->after('products_page_subtitle');
            $table->text('blog_page_subtitle')->nullable()->after('blog_page_title');
        });

        DB::table('site_settings')
            ->whereNull('products_page_title')
            ->update([
                'products_page_title' => 'KATALOG ARMADA TRUK SHACMAN',
                'products_page_subtitle' => 'Pilihan dump truck dan tractor head bertenaga tinggi untuk sektor pertambangan nikel, batu bara, quarry, serta logistik angkutan berat di seluruh Indonesia.',
                'blog_page_title' => 'BLOG & ARTIKEL TERBARU',
                'blog_page_subtitle' => 'Informasi terkini mengenai inovasi armada SHACMAN, tips perawatan mesin Weichai, panduan keselamatan hauling tambang, dan perkembangan industri alat berat.',
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'products_page_title',
                'products_page_subtitle',
                'blog_page_title',
                'blog_page_subtitle',
            ]);
        });
    }
};
