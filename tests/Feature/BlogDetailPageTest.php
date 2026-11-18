<?php

declare(strict_types=1);

use App\Models\Post;
use App\Models\SiteSetting;

it('renders the blog detail page with toc container, reading time, share bar, and cta', function (): void {
    SiteSetting::create([]);

    $post = Post::create([
        'title' => 'Panduan Perawatan Mesin Weichai Dump Truck',
        'slug' => 'panduan-perawatan-mesin-weichai',
        'excerpt' => 'Tips menjaga keandalan armada tambang agar tetap produktif.',
        'content' => '<h2>Pemeriksaan Harian</h2><p>Periksa oli dan filter setiap shift kerja.</p><h3>Jadwal Servis Berkala</h3><p>Lakukan servis rutin per 250 jam operasi.</p>',
        'is_published' => true,
        'published_at' => now(),
    ]);

    $response = $this->get(route('blog.detail', $post->slug));

    $response->assertSuccessful();
    $response->assertSee('Panduan Perawatan Mesin Weichai Dump Truck');
    $response->assertSee('Menit Baca');
    $response->assertSee('Daftar Isi');
    $response->assertSee('Pemeriksaan Harian');
    $response->assertSee('Bagikan Artikel Ini');
    $response->assertSee('Salin Link');
    $response->assertSee('Hubungi Kami');
});

it('displays published related articles in the baca juga sidebar excluding self and drafts', function (): void {
    SiteSetting::create([]);

    $current = Post::create([
        'title' => 'Artikel Utama SHACMAN',
        'slug' => 'artikel-utama-shacman',
        'content' => '<p>Konten utama</p>',
        'is_published' => true,
        'published_at' => now(),
    ]);

    $related = Post::create([
        'title' => 'Artikel Terkait Gardan Hande',
        'slug' => 'artikel-terkait-gardan-hande',
        'content' => '<p>Konten terkait</p>',
        'is_published' => true,
        'published_at' => now()->subDay(),
    ]);

    $draft = Post::create([
        'title' => 'Artikel Draft Rahasia',
        'slug' => 'artikel-draft-rahasia',
        'content' => '<p>Draft</p>',
        'is_published' => false,
        'published_at' => now(),
    ]);

    $response = $this->get(route('blog.detail', $current->slug));

    $response->assertSuccessful();
    $response->assertSee('Baca Juga');
    $response->assertSee($related->title);
    $response->assertDontSee($draft->title);
});

it('returns 404 for unpublished or missing blog posts', function (): void {
    SiteSetting::create([]);

    Post::create([
        'title' => 'Artikel Belum Terbit',
        'slug' => 'artikel-belum-terbit',
        'content' => '<p>Draft</p>',
        'is_published' => false,
    ]);

    $this->get(route('blog.detail', 'artikel-belum-terbit'))->assertNotFound();
    $this->get(route('blog.detail', 'tidak-ada'))->assertNotFound();
});
