<?php

use App\Models\Product;
use App\Models\TruckSeries;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('katalog produk mengarahkan tombol detail unit ke halaman detail produk', function () {
    $series = TruckSeries::create([
        'key' => 'X3000',
        'name' => 'X3000',
        'is_active' => true,
        'order_column' => 1,
    ]);

    $product = Product::create([
        'truck_series_id' => $series->id,
        'slug' => 'shacman-x3000-dump-truck',
        'name' => 'SHACMAN X3000',
        'type' => 'Dump Truck 6x4 & 8x4',
        'drive' => '6x4 / 8x4 Heavy Axle',
        'engine' => 'Weichai WP12 / Cummins ISM',
        'capacity' => '30 - 45 Ton',
        'is_active' => true,
        'order_column' => 1,
    ]);

    $response = $this->get(route('produk'));

    $response->assertSuccessful();
    $response->assertSee(route('produk.detail', $product->slug), false);
    $response->assertSee('Detail Unit');
    $response->assertSee('Truck Series');
    $response->assertDontSee('Chassis / Drive');
});

test('halaman detail produk menampilkan galeri, ringkasan, tabel spesifikasi, form penawaran, dan unit terkait', function () {
    $series = TruckSeries::create([
        'key' => 'X3000',
        'name' => 'X3000',
        'is_active' => true,
        'order_column' => 1,
    ]);

    $product = Product::create([
        'truck_series_id' => $series->id,
        'slug' => 'shacman-x3000-dump-truck',
        'name' => 'SHACMAN X3000',
        'type' => 'Dump Truck 6x4 & 8x4',
        'badge' => 'Flagship Heavy-Duty',
        'drive' => '6x4 / 8x4 Heavy Axle',
        'engine' => 'Weichai WP12 / Cummins ISM',
        'capacity' => '30 - 45 Ton',
        'description' => 'Truk heavy-duty premium dengan kabin suspensi udara dan torsi tinggi.',
        'is_active' => true,
        'order_column' => 1,
    ]);

    $related = Product::create([
        'truck_series_id' => $series->id,
        'slug' => 'shacman-f3000-dump-truck',
        'name' => 'SHACMAN F3000',
        'type' => 'Dump Truck Mining Extreme',
        'drive' => '6x4 / 8x4 Double Reduction',
        'engine' => 'Weichai WP12 High Output',
        'is_active' => true,
        'order_column' => 2,
    ]);

    $response = $this->get(route('produk.detail', $product->slug));

    $response->assertSuccessful();
    $response->assertSee('SHACMAN X3000');
    $response->assertSee('Specification', false);
    $response->assertSee('Wheelbase');
    $response->assertSee('GVM (Gross Vehicle Weight)');
    $response->assertSee('Emission Standard');
    $response->assertSee('FAST 12-Speed Manual');
    $response->assertSee(route('kontak'), false);
    $response->assertSee('Unit SHACMAN Lainnya');
    $response->assertSee(route('produk.detail', $related->slug), false);
});

test('spesifikasi khusus dari database mem-bypass default seri pada halaman detail', function () {
    $series = TruckSeries::create([
        'key' => 'X3000',
        'name' => 'X3000',
        'is_active' => true,
        'order_column' => 1,
    ]);

    $product = Product::create([
        'truck_series_id' => $series->id,
        'slug' => 'shacman-x3000-custom',
        'name' => 'SHACMAN X3000 8x4 Mining',
        'specifications' => [
            ['item' => 'Kode Model', 'value' => 'SX33186V326 Custom'],
            ['item' => 'GVM', 'value' => '31.000 kg'],
        ],
        'is_active' => true,
        'order_column' => 1,
    ]);

    $response = $this->get(route('produk.detail', $product->slug));

    $response->assertSuccessful();
    $response->assertSee('SX33186V326 Custom');
    $response->assertSee('31.000 kg');
});

test('varian tractor head otomatis menyesuaikan spesifikasi coupling dan drive unit', function () {
    $series = TruckSeries::create([
        'key' => 'F3000',
        'name' => 'F3000',
        'is_active' => true,
        'order_column' => 1,
    ]);

    $product = Product::create([
        'truck_series_id' => $series->id,
        'slug' => 'shacman-f3000-tractor-head-6x4',
        'name' => 'SHACMAN F3000 Tractor Head',
        'type' => 'Tractor Head 6x4',
        'drive' => '6x4 Tractor Axle',
        'engine' => 'Weichai WP12 430HP',
        'is_active' => true,
        'order_column' => 1,
    ]);

    $response = $this->get(route('produk.detail', $product->slug));

    $response->assertSuccessful();
    $response->assertSee('6x4 Tractor Axle');
    $response->assertSee('Coupling / Fifth Wheel');
    $response->assertSee('JOST 50# / 90# Heavy-Duty Fifth Wheel');
});

test('varian water tank otomatis menyesuaikan spesifikasi tangki', function () {
    $series = TruckSeries::create([
        'key' => 'H3000',
        'name' => 'H3000',
        'is_active' => true,
        'order_column' => 1,
    ]);

    $product = Product::create([
        'truck_series_id' => $series->id,
        'slug' => 'shacman-h3000-water-tank-4x2',
        'name' => 'SHACMAN H3000 Water Tank 4x2',
        'type' => 'Water Tank',
        'drive' => '4x2 Hande Axle',
        'engine' => 'Weichai WP10',
        'is_active' => true,
        'order_column' => 1,
    ]);

    $response = $this->get(route('produk.detail', $product->slug));

    $response->assertSuccessful();
    $response->assertSee('4x2 Hande Axle');
    $response->assertSee('Water Tank');
});

test('halaman detail produk mengembalikan 404 untuk slug tidak aktif atau tidak ditemukan', function () {
    $series = TruckSeries::create([
        'key' => 'H3000',
        'name' => 'H3000',
        'is_active' => true,
        'order_column' => 1,
    ]);

    Product::create([
        'truck_series_id' => $series->id,
        'slug' => 'shacman-h3000-nonaktif',
        'name' => 'SHACMAN H3000 Nonaktif',
        'is_active' => false,
        'order_column' => 1,
    ]);

    $this->get('/produk/unit/shacman-h3000-nonaktif')->assertNotFound();
    $this->get('/produk/unit/tidak-ada-unit')->assertNotFound();
});

test('rute series produk tetap berjalan tanpa bentrok dengan rute detail unit', function () {
    TruckSeries::create([
        'key' => 'X3000',
        'name' => 'X3000',
        'is_active' => true,
        'order_column' => 1,
    ]);

    $this->get(route('produk.series', 'x3000'))->assertSuccessful();
});
