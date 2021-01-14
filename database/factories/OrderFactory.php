<?php

use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'identify'          => $faker->regexify('[A-Z]{5}[0-4]{3}'),
        'total'             => $faker->numberBetween(1000, 10000),
        'payment_method'    => $faker->creditCardType(),
        'notes'             => $faker->text(),
    ];
});
