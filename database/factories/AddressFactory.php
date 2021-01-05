<?php

use App\Models\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'address'           => $faker->unique()->address,
        'city'              => $faker->city,
        'state'             => $faker->state,
        'post_code'         => $faker->postcode,
    ];
});
