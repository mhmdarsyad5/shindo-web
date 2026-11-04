<?php

use App\Models\Lead;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('authenticated admin can access leads index page in filament', function () {
    $user = User::factory()->create();
    $lead = Lead::factory()->create([
        'name' => 'Pak Direktur Tambang',
        'phone' => '081233445566',
        'company' => 'PT Borneo Jaya',
        'truck_series' => 'SHACMAN X3000',
    ]);

    $response = $this->actingAs($user)->get('/admin/leads');

    $response->assertStatus(200);
    $response->assertSee('Pak Direktur Tambang');
    $response->assertSee('PT Borneo Jaya');
});
