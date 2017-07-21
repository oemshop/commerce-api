<?php

namespace App\Models\Base;

use App\Traits\Query\Searchable;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use Searchable;
}
