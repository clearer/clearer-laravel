<?php

use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
    return [
        'description' => $faker->realText(255),
        'user_id' => $faker->numberBetween(1,50),
        'project_id' => $faker->numberBetween(1,50),
        'team_id'   => $faker->numberBetween(1,5),
        'due_date' => $faker->dateTime,
        'title' => $faker->realText(150)
    ];
});
