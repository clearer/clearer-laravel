<?php

use Faker\Generator as Faker;

$factory->define(App\Idea::class, function (Faker $faker) {
    return [
        'description' => $faker->realText(150),
        'title'       => $faker->realText(255),
        'owner_id'    => $faker->numberBetween(1,100),
        'question_id' => $faker->numberBetween(1,100)
    ];
});
