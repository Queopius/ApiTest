<?php

use App\Models\OrderDetail;
use Faker\Generator as Faker;

$factory->define(OrderDetail::class, function (Faker $faker) {
    return [
        'quantity'          => $faker->numberBetween(1, 10),
        'price'             => $faker->numberBetween(100, 1000),
        'active'            => $faker->boolean(),
        'id_order'          => rand(1, 10),
    ];
});
