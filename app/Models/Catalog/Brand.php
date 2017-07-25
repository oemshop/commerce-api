<?php

namespace App\Models\Catalog;

use App\Traits\Query\Searchable;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use Searchable;
}
