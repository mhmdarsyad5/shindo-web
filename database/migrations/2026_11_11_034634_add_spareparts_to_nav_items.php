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
        $this->updateNavTable('site_settings', ['url' => '/spareparts', 'label' => 'Spareparts']);
        $this->updateNavTable('homepage_settings', ['label' => 'Spareparts', 'url' => '/spareparts', 'is_active' => false]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $this->removeFromNavTable('site_settings');
        $this->removeFromNavTable('homepage_settings');
    }

    /**
     * Insert the Spareparts nav item right after /produk when absent.
     *
     * @param  array<string, mixed>  $newItem
     */
    private function updateNavTable(string $table, array $newItem): void
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

            $alreadyExists = false;
            foreach ($items as $item) {
                if (($item['url'] ?? null) === '/spareparts') {
                    $alreadyExists = true;
                    break;
                }
            }

            if ($alreadyExists) {
                continue;
            }

            $updated = [];
            $inserted = false;
            foreach ($items as $item) {
                $updated[] = $item;
                if (! $inserted && ($item['url'] ?? null) === '/produk') {
                    $updated[] = $newItem;
                    $inserted = true;
                }
            }

            if (! $inserted) {
                $updated[] = $newItem;
            }

            DB::table($table)
                ->where('id', $row->id)
                ->update(['nav_items' => json_encode($updated)]);
        }
    }

    private function removeFromNavTable(string $table): void
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

            $filtered = array_values(array_filter(
                $items,
                fn (array $item): bool => ($item['url'] ?? null) !== '/spareparts'
            ));

            DB::table($table)
                ->where('id', $row->id)
                ->update(['nav_items' => json_encode($filtered)]);
        }
    }
};
