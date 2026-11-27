<?php

test('registration route is disabled', function () {
    $response = $this->get('/register');

    $response->assertStatus(404);
});
