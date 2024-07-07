<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;

beforeEach(function () {
    $this->adminUser = User::factory()->create(['is_staff' => true, 'account_type' => 'staff']);
    $this->actingAs($this->adminUser);
});

afterEach(function () {
    $this->adminUser->delete();
});

test('admin dashboard can render', function () {
    $response = $this->get('/admin/dashboard');
    $response->assertStatus(200);
});

test('admin users page can render', function () {
    $response = $this->get('/admin/users');
    $response->assertStatus(200);
});

test('admin dashboard cannot render for other users', function () {
    $this->user = User::factory()->create(['is_staff' => false, 'account_type' => 'customer']);
    $this->actingAs($this->user);
    $response = $this->get('/admin/dashboard');
    $response->assertStatus(403);
});

test('admin users page cannot render for other users', function () {
    $this->user = User::factory()->create(['is_staff' => false, 'account_type' => 'customer']);
    $this->actingAs($this->user);
    $response = $this->get('/admin/users');
    $response->assertStatus(403);
});
