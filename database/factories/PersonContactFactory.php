<?php

$factory->define(App\Models\Base\PersonContact::class, function (Faker\Generator $faker) {
    static $person_id;

    return [
        'person_id' => $person_id ?: $person_id = $this->create(App\Models\Base\Person::class)->id,
        'title' => $faker->name,
        'phone' => $faker->postcode,
        'observation' => $faker->name,
    ];
});
