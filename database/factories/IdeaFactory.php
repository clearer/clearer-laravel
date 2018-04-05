<?php

use Faker\Generator as Faker;

$factory->define(App\Idea::class, function (Faker $faker) {
    return [
        'description' => $faker->realText(150),
        'title'       => $faker->realText(255),
        'user_id'     => $faker->numberBetween(1,100),
        'project_id'  => $faker->numberBetween(1,100),
        'question_id' => $faker->numberBetween(1,100),
        'team_id'     => $faker->numberBetween(1,5)
    ];
});
