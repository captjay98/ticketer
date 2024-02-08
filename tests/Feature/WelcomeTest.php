<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

test('Welcome page can render', function () {
    $response = $this->get('/');
    $response->assertStatus(200);
});

it('uses the Welcome component', function () {
    $response = $this->get('/');

    $response->assertInertia(
        fn ($page) =>
        $page->component('Welcome')
    );
});

it('has trips', function () {
    $response = $this->get('/');
    $response->assertInertia(
        fn ($page) => $page->has('trips')
    );
});

it('trips has expected structure', function () {
    $response = $this->get('/');

    $response->assertInertia(
        fn ($page) =>
        $page->has(
            'trips',
            fn ($page) =>
            $page->whereAll([
                'title' => '',
                'source' => '',
                'destination' => '',
                'seats' => '',
                'date' => '',
                'departure_time' => '',
                'arrival_time' => '',
            ])->etc()
        )
    );
});
