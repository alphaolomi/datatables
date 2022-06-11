<?php

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Str;

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});


test('new users can register', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
//    create random email address
        'email' =>  Str::random(10) . '@example.com',
        'password' => 'long password',
        'password_confirmation' => 'long password',
    ]);

    $response->assertSessionHasNoErrors();
    $this->assertAuthenticated();
    $response->assertRedirect(RouteServiceProvider::HOME);
});
