<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteAccessibilityTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        // Create a test user
        $this->user = \App\Models\User::factory()->create([
            'country' => 'Ireland',
            'biography' => 'Test biography',
            'level' => 1,
            'role' => 'user',
            'onboarded' => true,
        ]);
    }

    public function test_public_routes_are_accessible()
    {
        $publicRoutes = [
            '/',
            '/login',
            '/register',
            '/about',        // add other public routes here
        ];

        foreach ($publicRoutes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200, "Failed asserting $route is accessible.");
        }
    }

    public function test_authenticated_routes_are_accessible()
    {
        $authRoutes = [
            '/dashboard',
            '/activities',
            '/activities/create',
            '/appposts',
            '/profile',
        ];

        foreach ($authRoutes as $route) {
            $response = $this->actingAs($this->user)->get($route);
            $response->assertStatus(200, "Failed asserting $route is accessible for authenticated user.");
        }
    }
}
