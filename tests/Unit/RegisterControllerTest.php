<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegisterControllerTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    public function testRegisterWithInvalidData()
    {
        $data = factory(\App\Models\Base\Person::class)
            ->make(['account_id' => 0])->toArray();

        $data['address'] = factory(\App\Models\Base\PersonAddress::class)
            ->make(['person_id' => 0])->toArray();

        $data['contacts'] = factory(\App\Models\Base\PersonContact::class, rand(2, 5))
            ->make(['person_id' => 0])->toArray();

        $data['user'] = factory(\App\Models\Base\User::class)
            ->make(['person_id' => 0, 'password' => 'secret123'])->toArray();

        $response = $this->json('POST', '/api/register', $data);

        $response
            ->assertStatus(200)
            ->assertJson(['success' => true]);
    }
}
