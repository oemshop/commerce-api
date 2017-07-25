<?php

namespace App\Models\Base;

use App\Traits\Query\Searchable;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use Searchable;

    protected $table = 'persons';

    protected $fillable = [
        'person_type_id',
        'name',
        'cpf_cnpj',
        'rg_ie',
    ];

    public function addresses()
    {
        return $this->hasMany(PersonAddress::class, 'person_id');
    }

    public function contacts()
    {
        return $this->hasMany(PersonContact::class, 'person_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'person_id');
    }
}
