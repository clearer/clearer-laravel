<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'description' => $faker->realText(255),
        'user_id' => $faker->numberBetween(1,100),
        'team_id'  => $faker->numberBetween(1,50),
        'title' => $faker->realText(150)
    ];
});
