<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function persons()
    {
        return $this->hasMany(Person::class);
    }
}
