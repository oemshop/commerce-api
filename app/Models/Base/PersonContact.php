<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class PersonContact extends Model
{
    protected $fillable = [
        'title',
        'phone',
        'observation',
    ];
}
