<?php

test('dashboard route is disabled', function () {
    $response = $this->get('/dashboard');
    $response->assertStatus(404);
});
