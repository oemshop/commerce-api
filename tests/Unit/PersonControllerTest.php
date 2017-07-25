<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Base\Person;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PersonControllerTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    public function testTntSearch()
    {
        $data = factory(Person::class, 10)->create();
        $query = Person::search($data->first()->name);

        $this->assertEquals($query->first()->toArray(), $data->first()->toArray());
    }
}
