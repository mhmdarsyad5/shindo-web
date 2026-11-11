<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $this->moveSparepartsAfter('site_settings', '/layanan', ['url' => '/spareparts', 'label' => 'Spareparts']);
        $this->moveSparepartsAfter('homepage_settings', '/layanan', ['label' => 'Spareparts', 'url' => '/spareparts', 'is_active' => false]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $this->moveSparepartsAfter('site_settings', '/produk', ['url' => '/spareparts', 'label' => 'Spareparts']);
        $this->moveSparepartsAfter('homepage_settings', '/produk', ['label' => 'Spareparts', 'url' => '/spareparts', 'is_active' => false]);
    }

    /**
     * Place the /spareparts nav entry right after the specified anchor URL.
     *
     * @param  array<string, mixed>  $defaultItem
     */
    private function moveSparepartsAfter(string $table, string $anchorUrl, array $defaultItem): void
    {
        if (! Schema::hasTable($table)) {
            return;
        }

        $rows = DB::table($table)->select(['id', 'nav_items'])->get();
        foreach ($rows as $row) {
            $items = is_string($row->nav_items) ? json_decode($row->nav_items, true) : $row->nav_items;
            if (! is_array($items)) {
                continue;
            }

            $sparepartsItem = $defaultItem;
            $withoutSpareparts = [];
            foreach ($items as $item) {
                if (($item['url'] ?? null) === '/spareparts') {
                    $sparepartsItem = $item;

                    continue;
                }
                $withoutSpareparts[] = $item;
            }

            $updated = [];
            $inserted = false;
            foreach ($withoutSpareparts as $item) {
                $updated[] = $item;
                if (! $inserted && ($item['url'] ?? null) === $anchorUrl) {
                    $updated[] = $sparepartsItem;
                    $inserted = true;
                }
            }

            if (! $inserted) {
                $updated[] = $sparepartsItem;
            }

            DB::table($table)
                ->where('id', $row->id)
                ->update(['nav_items' => json_encode($updated)]);
        }
    }
};
