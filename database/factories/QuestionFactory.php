<?php

use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
    return [
        'description' => $faker->realText(255),
        'image' => '//placehold.it/200x150',
        'owner_id' => $faker->numberBetween(1,50),
        'project_id' => $faker->numberBetween(1,50),
        'time_due' => $faker->dateTime,
        'title' => $faker->realText(150)
    ];
});
