<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_admin_dashboard_can_render(): void
    {
        $this->withoutMiddleware();
        $response = $this->get('/admin/dashboard');

        $response->assertStatus(200);
    }

    public function test_admin_users_page_can_render(): void
    {
        $this->withoutMiddleware();
        $response = $this->get('/admin/users');

        $response->assertStatus(200);
    }
}
