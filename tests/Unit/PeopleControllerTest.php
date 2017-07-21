<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Base\People;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PeopleControllerTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    public function testTntSearch()
    {
        $data = factory(People::class, 10)->create();
        $query = People::search($data->first()->name);

        $this->assertEquals($query->first()->toArray(), $data->first()->toArray());
    }
}
