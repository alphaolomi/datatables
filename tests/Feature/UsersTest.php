<?php

use Illuminate\Testing\Fluent\AssertableJson;

it('has users page', function () {

    $response = $this->get('/users');

    $response->assertStatus(200);
    $response->assertViewIs('users.index');
    $response->assertSee('Users');
    // assert page has DT scripts
    $response->assertSee('LaravelDataTables');
});

it('can get users data ajax | basic', function () {

    $response = $this->getJson('/users?draw=1', [
        'XMLHttpRequest' => 'XMLHttpRequest',
    ]);
    $response->assertStatus(200);
    // {
    //     "draw": 0,
    //     "recordsTotal": 11010,
    //     "recordsFiltered": 11010,
    //     "data": [],
    //     "queries": []
    // }
    // $response
    //     ->assertJson(
    //         fn (AssertableJson $json) => $json->has('data')
    //     );
});

it('can get users data via ajax | realist', function () {
    $url = "/users?draw=1&columns%5B0%5D%5Bdata%5D=id&columns%5B1%5D%5Bdata%5D=name&columns%5B2%5D%5Bdata%5D=email&columns%5B3%5D%5Bdata%5D=created_at&columns%5B4%5D%5Bdata%5D=action&columns%5B4%5D%5Bsearchable%5D=false&columns%5B4%5D%5Borderable%5D=false&order%5B0%5D%5Bcolumn%5D=1&order%5B0%5D%5Bdir%5D=desc&start=0&length=10&search%5Bvalue%5D=&_=1654905623884";
    $headers = [
        'Accept' => 'application/json, text/javascript, */*; q=0.01',
        'Accept-Encoding' => 'gzip, deflate, br',
        'User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36',
        'X-Requested-With' => 'XMLHttpRequest',
    ];
    $response = $this->getJson($url, $headers);
    $response->assertStatus(200);
    // Response:
    // {
    //     "draw": 0,
    //     "recordsTotal": 11010,
    //     "recordsFiltered": 11010,
    //     "data": [{},{}],
    //     "queries": [{},{}]
    // }
    $response
        ->assertJson(
            fn (AssertableJson $json) => $json->hasAll(['draw','data'])->etc()
        );
});

//
