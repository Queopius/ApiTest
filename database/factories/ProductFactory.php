<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'uuid'                 => $faker->uuid(),
        'name'                 => $faker->word(),
        'description'          => $faker->text(2000),
        'sku'                  => $faker->unique()->regexify('[A-Z]{3}-[0-9]{3}-[0-9]{3}'),
        'quantity'             => $faker->randomDigit(),
        'price'                => $faker->numberBetween(1000, 10000),
        'discount'             => $faker->numberBetween(0, 100),
    ];
});
