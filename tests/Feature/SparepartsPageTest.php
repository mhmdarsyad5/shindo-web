<?php

declare(strict_types=1);

use App\Models\SiteSetting;

it('renders the spareparts page with all categories, items, and mechanic section', function (): void {
    SiteSetting::create([]);

    $response = $this->get(route('spareparts'));

    $response->assertSuccessful();
    $response->assertSee('SPAREPARTS SUPPORT');
    $response->assertSee('Cabin Parts');
    $response->assertSee('Electrical Parts');
    $response->assertSee('Engine Parts');
    $response->assertSee('Chassis Parts');
    $response->assertSee('Others Parts');
    $response->assertSee('Headlamp Assembly');
    $response->assertSee('Solenoid Valve');
    $response->assertSee('Engine Assy');
    $response->assertSee('Brake Drum');
    $response->assertSee('Steering Pump');
    $response->assertSee('LAYANAN MEKANIK 24 JAM');
    $response->assertSee('Hubungi Kami');
    $response->assertDontSee('Order / Tanya Spareparts');
    $response->assertDontSee('Hubungi Mekanik 24 Jam');
    $response->assertDontSee('<span>Order / Tanya</span>', false);
});

it('displays spareparts link in public navigation', function (): void {
    SiteSetting::create([]);

    $response = $this->get(route('produk'));

    $response->assertSuccessful();
    $response->assertSee('href="/spareparts"', false);
    $response->assertSee('Spareparts');
    $response->assertSeeInOrder(['Layanan', 'Spareparts']);
});

it('matches breadcrumb style, includes services banner, and omits filter, search, and category descriptions', function (): void {
    SiteSetting::create([]);

    $response = $this->get(route('spareparts'));

    $response->assertSuccessful();
    $response->assertSee('<span class="text-slate-300">/</span>', false);
    $response->assertSee('images/series/pro_detail08_1.jpg', false);
    $response->assertDontSee('sparepartSearchInput');
    $response->assertDontSee('Komponen mesin utama');
});

it('has all configured sparepart and mechanic image files in public directory', function (): void {
    $config = config('spareparts');

    expect($config['items'])->toHaveCount(70);
    expect($config['mechanics'])->toHaveCount(9);

    foreach ($config['items'] as $item) {
        expect(file_exists(public_path($item['image'])))->toBeTrue("Missing sparepart image: {$item['image']}");
    }

    foreach ($config['mechanics'] as $mech) {
        expect(file_exists(public_path($mech['image'])))->toBeTrue("Missing mechanic image: {$mech['image']}");
    }
});
