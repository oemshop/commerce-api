<?php

$factory->define(App\Models\Base\User::class, function (Faker\Generator $faker) {
    static $person_id, $password;

    return [
        'person_id' => $person_id ?? $person_id = $this->create(App\Models\Base\Person::class)->id,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?? $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
