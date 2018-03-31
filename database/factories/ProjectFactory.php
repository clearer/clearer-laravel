<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'color' => '#ffffff',
        'context' => $faker->realText(255),
        'owner_id' => $faker->numberBetween(1,100),
        'team_id'  => $faker->numberBetween(1,50),
        'title' => $faker->realText(150),
    ];
});
