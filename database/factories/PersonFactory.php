<?php

$factory->define(App\Models\Base\Person::class, function (Faker\Generator $faker) {
    static $account_id, $person_type_id;

    $faker->addProvider(new \Faker\Provider\pt_BR\Person($faker));
    $faker->addProvider(new \Faker\Provider\pt_BR\Company($faker));

    return [
        'account_id' => $account_id != null ? $account_id : $account_id = $this->create(App\Models\Base\Account::class)->id,
        'person_type_id' => $person_type_id ?? $person_type_id = rand(1, 2),
        'name' => $faker->name,
        'cpf_cnpj' => $person_type_id == 1 ? $faker->cpf(false) : $faker->cnpj(false),
        'rg_ie' => str_random(16),
    ];
});
