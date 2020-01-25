<?php

/** 
 * Defines the model factory for our cards table.
 */

$factory->define(\App\Card::class, function(Faker\Generator $faker) {
    return [
        'value' => $faker->numberBetween(0, 30),
        'color' => $faker->hexColor
    ];
});