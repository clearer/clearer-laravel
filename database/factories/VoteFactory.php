<?php

use Faker\Generator as Faker;

$factory->define(App\Vote::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 200),
        'idea_id' => $faker->numberBetween(1,100)
    ];
});
