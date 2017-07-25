<?php

$factory->define(App\Models\Base\Account::class, function (Faker\Generator $faker) {
    return [
        'secret_key' => str_random(10),
        'public_key' => str_random(10),
    ];
});

$factory->define(App\Models\Base\People::class, function (Faker\Generator $faker) {
    static $account_id;

    $faker->addProvider(new \Faker\Provider\pt_BR\Person($faker));

    return [
        'account_id' => $account_id ?: $account_id = $this->create(App\Models\Base\Account::class)->id,
        'person_type_id' => 1,
        'name' => $faker->name,
        'company_name' => $faker->name,
        'document_cpf_cnpj' => $faker->cpf(false),
        'document_rg_ie' => str_random(16),
    ];
});

$factory->define(App\Models\Base\User::class, function (Faker\Generator $faker) {
    static $person_id, $password;

    return [
        'person_id' => $person_id ?: $person_id = $this->create(App\Models\Base\People::class)->id,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Catalog\Brand::class, function (Faker\Generator $faker) {
    static $account_id;

    $faker->addProvider(new \Faker\Provider\pt_BR\Text($faker));

    return [
        'account_id' => $account_id ?: $account_id = $this->create(App\Models\Base\Account::class)->id,
        'name' => $faker->title,
    ];
});
