<?php

use App\Models\User;

it('has home page', function () {

    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/home');

    $response->assertStatus(200);
    // Dashboard
    $response->assertSee('Dashboard');
});
