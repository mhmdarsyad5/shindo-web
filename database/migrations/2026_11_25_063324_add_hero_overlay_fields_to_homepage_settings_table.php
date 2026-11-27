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
        Schema::table('homepage_settings', function (Blueprint $table) {
            $table->text('hero_description')->nullable()->after('hero_tagline');
            $table->json('hero_points')->nullable()->after('hero_description');
            $table->string('hero_cta_text')->nullable()->after('hero_points');
            $table->string('hero_cta_url')->nullable()->after('hero_cta_text');
        });

        DB::table('homepage_settings')
            ->whereNull('hero_description')
            ->update([
                'hero_description' => 'Kombinasi teknologi mesin tangguh, konstruksi kokoh, dan dukungan purna jual menyeluruh untuk menunjang profitabilitas armada Anda.',
                'hero_points' => json_encode([
                    'Ketersediaan Genuine Parts',
                    'Authorized Dealer SHACMAN',
                    'SHASS (Shacman After Sales Service) 24 Jam',
                ]),
                'hero_cta_text' => 'PELAJARI LEBIH LANJUT',
                'hero_cta_url' => '/tentang-kami',
            ]);

        $iconMap = ['flame' => 'cpu', 'droplet' => 'fuel', 'shield' => 'truck'];
        foreach (DB::table('homepage_settings')->get() as $row) {
            $items = json_decode((string) $row->advantages_items, true);
            if (! is_array($items)) {
                continue;
            }
            $changed = false;
            foreach ($items as &$item) {
                if (isset($item['icon'], $iconMap[$item['icon']])) {
                    $item['icon'] = $iconMap[$item['icon']];
                    $changed = true;
                }
            }
            unset($item);
            if ($changed) {
                DB::table('homepage_settings')
                    ->where('id', $row->id)
                    ->update(['advantages_items' => json_encode($items)]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homepage_settings', function (Blueprint $table) {
            $table->dropColumn([
                'hero_description',
                'hero_points',
                'hero_cta_text',
                'hero_cta_url',
            ]);
        });
    }
};
