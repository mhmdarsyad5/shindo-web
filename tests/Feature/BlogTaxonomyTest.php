<?php

declare(strict_types=1);

use App\Models\BlogCategory;
use App\Models\BlogTag;
use App\Models\Post;
use App\Models\SiteSetting;

it('filters blog posts by category query parameter', function (): void {
    SiteSetting::create([]);
    BlogCategory::create(['name' => 'Spare Parts', 'order_column' => 1, 'is_active' => true]);
    BlogCategory::create(['name' => 'Berita', 'order_column' => 2, 'is_active' => true]);

    Post::create([
        'title' => 'Artikel Suku Cadang Resmi',
        'slug' => 'artikel-suku-cadang-resmi',
        'excerpt' => 'Ringkasan spare parts.',
        'content' => '<p>Konten spare parts.</p>',
        'category' => 'Spare Parts',
        'is_published' => true,
        'published_at' => now(),
    ]);

    Post::create([
        'title' => 'Berita Armada Tambang',
        'slug' => 'berita-armada-tambang',
        'excerpt' => 'Ringkasan berita.',
        'content' => '<p>Konten berita.</p>',
        'category' => 'Berita',
        'is_published' => true,
        'published_at' => now()->subDay(),
    ]);

    $response = $this->get(route('blog', ['kategori' => 'spare-parts']));

    $response->assertSuccessful();
    $response->assertSee('Artikel Suku Cadang Resmi');
    $response->assertDontSee('Berita Armada Tambang');
});

it('renders clickable tag links on blog detail and filters posts on tag archive page', function (): void {
    SiteSetting::create([]);
    BlogTag::create(['name' => 'Weichai']);

    $post = Post::create([
        'title' => 'Perawatan Mesin Weichai',
        'slug' => 'perawatan-mesin-weichai',
        'excerpt' => 'Tips mesin Weichai.',
        'content' => '<p>Detail mesin Weichai.</p>',
        'category' => 'Technical Update',
        'tags' => ['Weichai', 'FAST Gear'],
        'is_published' => true,
        'published_at' => now(),
    ]);

    Post::create([
        'title' => 'Panduan Safety Tambang',
        'slug' => 'panduan-safety-tambang',
        'excerpt' => 'Tips safety.',
        'content' => '<p>Detail safety.</p>',
        'category' => 'Safety',
        'tags' => ['Safety'],
        'is_published' => true,
        'published_at' => now()->subDay(),
    ]);

    $detailResponse = $this->get(route('blog.detail', $post->slug));
    $detailResponse->assertSuccessful();
    $detailResponse->assertSee(route('blog.tag', 'weichai'), false);
    $detailResponse->assertSee(route('blog', ['kategori' => 'technical-update']), false);

    $tagResponse = $this->get(route('blog.tag', 'weichai'));
    $tagResponse->assertSuccessful();
    $tagResponse->assertSee('Perawatan Mesin Weichai');
    $tagResponse->assertSee('#Weichai');
    $tagResponse->assertDontSee('Panduan Safety Tambang');

    $this->get(route('blog.tag', 'tag-tidak-ada'))->assertNotFound();
});

it('paginates regular blog posts and highlights the latest featured post', function (): void {
    SiteSetting::create([]);

    Post::create([
        'title' => 'Artikel Non Featured Terbaru',
        'slug' => 'non-featured-terbaru',
        'excerpt' => 'Ringkasan.',
        'content' => '<p>Konten.</p>',
        'is_published' => true,
        'is_featured' => false,
        'published_at' => now(),
    ]);

    Post::create([
        'title' => 'Artikel Pilihan Utama',
        'slug' => 'artikel-pilihan-utama',
        'excerpt' => 'Ringkasan featured.',
        'content' => '<p>Konten featured.</p>',
        'is_published' => true,
        'is_featured' => true,
        'published_at' => now()->subHour(),
    ]);

    for ($i = 1; $i <= 10; $i++) {
        Post::create([
            'title' => "Artikel Reguler {$i}",
            'slug' => "artikel-reguler-{$i}",
            'excerpt' => "Ringkasan {$i}.",
            'content' => "<p>Konten {$i}.</p>",
            'is_published' => true,
            'is_featured' => false,
            'published_at' => now()->subDays($i),
        ]);
    }

    $page1 = $this->get(route('blog'));
    $page1->assertSuccessful();
    $page1->assertSee('Artikel Pilihan Utama');
    $page1->assertSee('FEATURED ARTICLE');
    $page1->assertSee('page=2');
    $page1->assertDontSee('BERITA TEKNIS');
    $page1->assertDontSee('SHACMAN ID');

    $page2 = $this->get(route('blog', ['page' => 2]));
    $page2->assertSuccessful();
    $page2->assertSee('Artikel Reguler 10');
});
