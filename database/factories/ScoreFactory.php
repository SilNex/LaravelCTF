<?php

use Faker\Generator as Faker;

$factory->define(App\Score::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'challenge_id' => 1,
        'log_id' => 1
    ];
});

$factory->state(App\Score::class, 'with_user_chall', function (Faker $faker) {
    $user = factory(App\User::class)->create();
    $challenge = factory(App\Challenge::class)->create();
    return [
        'user_id' => $user->id,
        'challenge_id' => $challenge->id,
        'log_id' => function () {
            return App\ScoreLog::create([
                'before_score' => $user->score,
                'give_point' => $challenge->point,
            ])->id;
        },
    ];
});