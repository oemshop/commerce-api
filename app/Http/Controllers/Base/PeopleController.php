<?php

namespace App\Http\Controllers\Base;

use App\Models\Base\People;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeopleController extends Controller
{
    public function index(Request $request)
    {
        $query = People::search('test')->get();
    }
}
