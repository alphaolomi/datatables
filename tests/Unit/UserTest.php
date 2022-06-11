<?php

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

uses(Tests\TestCase::class);

it('can insert user into database', function () {
    $this->assertModelExists(User::create([
        'name' => 'John Doe',
        'email' => 'johndoe' . Str::random(10) . '@mailserver.com',
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => '10$92IXUNp',
    ]));

});

it('can cast cerated at date to given format', function () {

    $now = now();
    $id = DB::table('users')->insertGetId([
        'name' => 'John Doe',
        'email' => 'johndoe' . Str::random(10) . '@mailserver.com',
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'created_at' => $now,
    ]);
    $userData = User::find($id)->toArray();

    // assert
    $this->assertEquals($now->format('M d, Y'), $userData['created_at']);

});
