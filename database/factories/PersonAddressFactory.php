<?php

$factory->define(App\Models\Base\PersonAddress::class, function (Faker\Generator $faker) {
    static $person_id;

    return [
        'person_id' => $person_id ?: $person_id = $this->create(App\Models\Base\Person::class)->id,
        'title' => $faker->name,
        'zipcode' => $faker->postcode,
        'street' => $faker->streetName,
        'number' => $faker->buildingNumber,
        'complement' => $faker->secondaryAddress,
        'reference' => $faker->streetAddress,
        'neighborhood' => $faker->cityPrefix,
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
    ];
});
