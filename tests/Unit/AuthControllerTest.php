<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthControllerTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    public function testWithoutCredentials()
    {
        $response = $this->json('POST', '/api/auth', []);

        $response
            ->assertStatus(422)
            ->assertJson(['error' => true]);
    }

    public function testWithInvalidCredentials()
    {
        $data = factory(\App\Models\Base\User::class)->create()->toArray();
        $data['password'] = 'invalid';
        $response = $this->json('POST', '/api/auth', $data);

        $response
            ->assertStatus(422)
            ->assertJson(['error' => true]);
    }

    public function testWithvalidCredentials()
    {
        $data = factory(\App\Models\Base\User::class)->create()->toArray();
        $data['password'] = 'secret';
        $response = $this->json('POST', '/api/auth', $data);

        $response
            ->assertStatus(200)
            ->assertJson(['success' => true]);
    }
}
