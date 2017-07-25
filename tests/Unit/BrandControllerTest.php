<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Catalog\Brand;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BrandControllerTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    public function testTntSearch()
    {
        $data = factory(Brand::class, 2)->create();
        $query = Brand::search($data->first()->title);

        $this->assertEquals($query->first()->toArray(), $data->first()->toArray());
    }
}
