<?php

test('homepage returns a successful response', function () {
    $response = $this->get('/');
    $response->assertStatus(200);
    $response->assertSee('HUBUNGI KAMI');
    $response->assertSee('SHACMAN – TRUK HEAVY-DUTY PILIHAN UTAMA INDONESIA');
    $response->assertSee('PILIHAN ARMADA SHACMAN');
    $response->assertSee('Solusi armada dan alat angkut berat tangguh untuk setiap kebutuhan bisnis Anda.');
    $response->assertSee('Konsultasikan kebutuhan armada truk dan spesifikasi unit bersama tim kami.');
    $response->assertSee('Beranda');
    $response->assertSee('Produk');
    $response->assertSee('Layanan');
    $response->assertSee('Tentang Kami');
    $response->assertSee('Blog');
    $response->assertSee('Kontak');
    $response->assertSee('homepage-quote-form');
    $response->assertSee('pro_detail08_1.jpg');
});

test('produk catalog returns a successful response', function () {
    $response = $this->get('/produk');
    $response->assertStatus(200);
});

test('tentang kami page returns a successful response', function () {
    $response = $this->get('/tentang-kami');
    $response->assertStatus(200);
});

test('blog page returns a successful response', function () {
    $response = $this->get('/blog');
    $response->assertStatus(200);
});

test('kontak page returns a successful response', function () {
    $response = $this->get('/kontak');
    $response->assertStatus(200);
    $response->assertSee('Town House Cordoba');
    $response->assertSee('maps.app.goo.gl/jUThKPX3Arf6VNVW8');
    $response->assertSee('google.com/maps/embed');
});

test('layanan page returns a successful response', function () {
    $response = $this->get('/layanan');
    $response->assertStatus(200);
});

test('produk series detail page returns a successful response with quote and manual buttons', function () {
    foreach (['x3000', 'h3000', 'f3000'] as $series) {
        $response = $this->get('/produk/'.$series);
        $response->assertStatus(200);
        $response->assertSee('Hubungi Kami');
        $response->assertSee('Download Product Manual');
        $response->assertSee('pro_detail01_3.png');
        $response->assertSee('62664cf7a6a3429d9ea7c4bceeee4551.pdf');
    }
});
