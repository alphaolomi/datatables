<?php

test('Welcome page', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
