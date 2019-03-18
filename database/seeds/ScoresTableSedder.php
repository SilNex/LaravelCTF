<?php

use Illuminate\Database\Seeder;

class ScoresTableSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Score::class, 30)
            ->make()
            ->each(function ($score) {
                $user = App\User::all()->random();
                $challenge = App\Challenge::all()->random();
                $score->giveScore($user, $challenge);
            });
    }
}
