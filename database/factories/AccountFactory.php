<?php

$factory->define(App\Models\Base\Account::class, function (Faker\Generator $faker) {
    return [
        'secret_key' => str_random(10),
        'public_key' => str_random(10),
    ];
});
