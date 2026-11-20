<?php

use App\Models\AboutSetting;
use App\Models\HomepageSetting;
use App\Models\IconAsset;
use App\Models\Post;
use App\Models\Product;
use App\Models\Service;
use App\Models\ServiceSetting;
use App\Models\SiteSetting;
use App\Models\SparepartsSetting;
use App\Models\TruckSeries;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('authenticated admin can access all CMS settings and resource edit pages', function () {
    $user = User::factory()->create();

    $about = AboutSetting::current();
    $site = SiteSetting::current();
    $serviceSetting = ServiceSetting::current();
    $spareparts = SparepartsSetting::current();
    $homepage = HomepageSetting::current();

    $service = Service::create([
        'title' => 'Layanan Servis Tambang',
        'slug' => 'layanan-servis-tambang',
        'description' => 'Servis on-site 24 jam.',
        'image' => 'services/service-banner-facility.jpg',
        'is_active' => true,
    ]);

    $product = Product::create([
        'name' => 'SHACMAN X3000 Dump Truck',
        'slug' => 'shacman-x3000-dump-truck',
        'type' => 'Dump Truck',
        'drive' => '6x4',
        'description' => 'Truk tambang heavy duty.',
        'image' => 'products/h3000s-dump-truck-6x4.webp',
        'is_active' => true,
    ]);

    $post = Post::create([
        'title' => 'Berita Perawatan Truk',
        'slug' => 'berita-perawatan-truk',
        'content' => 'Panduan lengkap perawatan mesin.',
        'image' => 'homepage/blog-dump-truck.jpg',
        'is_published' => true,
    ]);

    $truckSeries = TruckSeries::create([
        'key' => 'X3000',
        'name' => 'X3000',
        'badge' => 'FLAGSHIP',
        'title' => 'Truk X3000',
        'description' => 'Heavy duty flagship.',
        'image' => 'homepage/shacman-x3000.png',
        'detail_url' => '/produk',
        'is_active' => true,
    ]);

    $iconAsset = IconAsset::create([
        'title' => 'Truk Tambang Heavy',
        'key' => 'truk-tambang-heavy',
        'file_path' => 'icons/test-icon.svg',
        'category' => 'Fleet',
    ]);

    $routes = [
        '/admin/about-settings/'.$about->id.'/edit',
        '/admin/site-settings/'.$site->id.'/edit',
        '/admin/service-settings/'.$serviceSetting->id.'/edit',
        '/admin/spareparts-settings/'.$spareparts->id.'/edit',
        '/admin/homepage-settings/'.$homepage->id.'/edit',
        '/admin/icon-assets',
        '/admin/icon-assets/create',
        '/admin/icon-assets/'.$iconAsset->id.'/edit',
        '/admin/services',
        '/admin/services/'.$service->id.'/edit',
        '/admin/products',
        '/admin/products/'.$product->id.'/edit',
        '/admin/posts',
        '/admin/posts/create',
        '/admin/posts/'.$post->id.'/edit',
        '/admin/truck-series',
        '/admin/truck-series/'.$truckSeries->id.'/edit',
    ];

    foreach ($routes as $route) {
        $response = $this->actingAs($user)->get($route);
        $response->assertStatus(200);
    }
});

test('post supports taxonomy and seo meta tags on frontend', function () {
    $post = Post::create([
        'title' => 'Panduan Perawatan Truk Tambang',
        'slug' => 'panduan-perawatan-truk-tambang',
        'content' => 'Langkah-langkah servis rutin dump truck.',
        'excerpt' => 'Ringkasan servis dump truck.',
        'image' => 'posts/sample.jpg',
        'category' => 'Maintenance',
        'tags' => ['Heavy Duty', 'Weichai'],
        'seo_title' => 'Tips Servis Truk Tambang Terbaik | SHINDO Official',
        'seo_description' => 'Panduan lengkap perawatan armada dump truck SHACMAN di lokasi tambang.',
        'seo_keywords' => 'servis truk, perawatan dump truck, spareparts shacman',
        'is_published' => true,
        'published_at' => now(),
    ]);

    $response = $this->get('/blog/'.$post->slug);
    $response->assertStatus(200);
    $response->assertSee('Tips Servis Truk Tambang Terbaik | SHINDO Official');
    $response->assertSee('Panduan lengkap perawatan armada dump truck SHACMAN di lokasi tambang.');
    $response->assertSee('servis truk, perawatan dump truck, spareparts shacman');
});

test('icon assets can be created and resolved in views', function () {
    $asset = IconAsset::create([
        'title' => 'Logo Hande Axle',
        'key' => 'hande-axle-logo',
        'file_path' => 'icons/hande.png',
        'category' => 'Powertrain',
    ]);

    expect($asset->url)->toContain('icons/hande.png');

    $html = IconAsset::renderIcon('asset:hande-axle-logo', 'w-8 h-8');
    expect($html)->toContain('<img src=')
        ->and($html)->toContain('w-8 h-8')
        ->and($html)->toContain('alt="Logo Hande Axle"');

    $options = IconAsset::getSelectOptions(['truck' => 'Truck']);
    expect($options)->toHaveKey('Custom Icons (Icons & Assets)')
        ->and($options['Custom Icons (Icons & Assets)'])->toHaveKey('asset:hande-axle-logo');
});
