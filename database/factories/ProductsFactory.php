<?php

use Faker\Generator as Faker;


$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->text(50),
        'price' => $faker->randomFloat(4, 1, 4),
        'tax' => $faker->randomFloat(3, 0, 0.05)
    ];
});
