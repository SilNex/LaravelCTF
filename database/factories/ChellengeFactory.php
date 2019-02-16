<?php

use Faker\Generator as Faker;

$factory->define(App\Challenge::class, function (Faker $faker) {
    $krFaker = \Faker\Factory::create("ko_KR");
    return [
        'point' => rand(10, 50) * 10,
        'title' => $krFaker->sentence,
        'link' => $faker->url,
        'description' => $krFaker->paragraph,
        'show_time' => $krFaker->dateTimeBetween($startDate = '-2 years', $endDate = 'now'),
    ];
});

$factory->state(App\Challenge::class, 'with_file', function (Faker $faker) {
    $baseFakeChallenge = factory(App\Challenge::class)->make();
    $createFile = factory(App\File::class)->state('challenge')->create();

    return $baseChallengeFake + [
        'file_id' => $createFile->id,
    ];
});

$factory->state(App\Challenge::class, 'with_hof', function (Faker $faker) {
    $baseFakeChallenge = factory(App\Challenge::class)->make();
    $createHof = factory(App\HallOfFame::class)->state('challenge')->create();

    return $baseFakeChallenge + [
        'hall_of_fame_id' => $createHof->id,
    ];
});


$factory->state(App\Challenge::class, 'full', function (Faker $faker) {
    $baseFakeChallenge = factory(App\Challenge::class)->make();
    $createFile = factory(App\File::class)->state('challenge')->create();
    $createHof = factory(App\HallOfFame::class)->state('challenge')->create();

    return $baseFakeChallenge + [
        'file_id' => $createFile->id,
        'hall_of_fame_id' => $createHof->id,
    ];
});