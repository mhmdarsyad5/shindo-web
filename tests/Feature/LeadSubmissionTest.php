<?php

use App\Models\SiteSetting;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('guest can submit lead from homepage and receives json with formatted whatsapp url', function () {
    SiteSetting::create([
        'site_name' => 'PT Shindo Tractors Adiperkasa',
        'office_phone' => '(021) 22574351',
    ]);

    $payload = [
        'name' => 'Budi Pratama',
        'phone' => '081234567890',
        'email' => 'budi@tambangmakmur.co.id',
        'company' => 'PT Tambang Makmur',
        'truck_series' => 'SHACMAN X3000 Series',
        'quantity' => '3 - 5 Unit',
        'location' => 'Morowali',
        'notes' => 'Butuh dump body 24 kubik Hardox',
        'source' => 'homepage',
    ];

    $response = $this->postJson('/leads', $payload);

    $response->assertStatus(200)
        ->assertJson([
            'success' => true,
        ])
        ->assertJsonStructure([
            'success',
            'message',
            'whatsapp_url',
            'lead_id',
        ]);

    $this->assertDatabaseHas('leads', [
        'name' => 'Budi Pratama',
        'phone' => '081234567890',
        'email' => 'budi@tambangmakmur.co.id',
        'company' => 'PT Tambang Makmur',
        'truck_series' => 'SHACMAN X3000 Series',
        'source' => 'homepage',
        'status' => 'new',
    ]);

    $responseData = $response->json();
    expect($responseData['whatsapp_url'])->toContain('wa.me');
    expect($responseData['whatsapp_url'])->toContain(urlencode('Budi Pratama'));
});

test('lead submission fails if required fields name or phone are missing', function () {
    $response = $this->postJson('/leads', [
        'company' => 'PT Tanpa Nama',
    ]);

    $response->assertStatus(422)
        ->assertJsonValidationErrors(['name', 'phone']);
});

test('lead submission accepts contact page payload properly', function () {
    $payload = [
        'name' => 'Andi Wijaya',
        'phone' => '082199998888',
        'email' => 'andi@mandiri.co.id',
        'company' => 'CV Mandiri Sejahtera',
        'notes' => 'Tolong info filter oli dan kanvas rem X3000',
        'source' => 'contact_page',
    ];

    $response = $this->postJson('/leads', $payload);

    $response->assertStatus(200)
        ->assertJson([
            'success' => true,
        ]);

    $this->assertDatabaseHas('leads', [
        'name' => 'Andi Wijaya',
        'phone' => '082199998888',
        'email' => 'andi@mandiri.co.id',
        'source' => 'contact_page',
    ]);
});
