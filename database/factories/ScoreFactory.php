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
    $user->update([
        'score' => $user->score + $challenge->point,
    ]);
    $this->giveScore($user, $challenge);
    return [
        'user_id' => $user->id,
        'challenge_id' => $challenge->id,
    ];
});