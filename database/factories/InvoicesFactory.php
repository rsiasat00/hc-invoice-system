<?php

use Faker\Generator as Faker;

$factory->define(App\Invoice::class, function (Faker $faker) {
    return [
        'name' => $faker->words($nb = 10, false), 
        'address' => [$faker->address] , 
        // 'invoice_date' =>[$faker->dateTime('now', null)], 
        // 'invoice_number' => [$faker->creditCardNumber], 
        // 'due_date' => $faker->dateTime('2019-12-30 11:59:59', null), 
        // 'note' => [$faker->text]
        // 'customer_id' => [function () {
        //     return factory(App\User::class)->create()->id;
        // }]
    ];
});
