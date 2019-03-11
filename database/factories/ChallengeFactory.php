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
        'flag' => hash('SHA256', $faker->sentence),
        'show_at' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+1 years')->format('Y-m-d H:i:s'),
    ];
});