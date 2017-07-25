<?php

namespace App\Http\Controllers\Base;

use App\Models\Catalog\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeopleController extends Controller
{
    public function index(Request $request)
    {
        $query = Brand::search('test')->get();
    }
}
