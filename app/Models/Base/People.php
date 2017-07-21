<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Query\Searchable;

class People extends Model
{
    use Searchable;
}
