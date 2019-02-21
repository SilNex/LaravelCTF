<?php

use Faker\Generator as Faker;

$factory->define(App\Challenge::class, function (Faker $faker) {
    $krFaker = \Faker\Factory::create("ko_KR");
    return [
        'point' => rand(10, 50) * 10,
        'title' => $faker->sentence,
        'link' => $faker->url,
        'description' => $krFaker->paragraph,
        'genre' => $faker->word,
        'flag' => $faker->sentence,
        'show_time' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now'),
    ];
});