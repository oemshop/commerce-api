<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class PersonAddress extends Model
{
    protected $fillable = [
        'title',
        'zipcode',
        'street',
        'number',
        'complement',
        'reference',
        'neighborhood',
        'city',
        'state',
    ];
}
