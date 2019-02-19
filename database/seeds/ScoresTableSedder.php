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
                $log = App\ScoreLog::create([
                    'before_score' => $user->score,
                    'give_point' => $challenge->point,
                ]);
                $score->user_id = $user->id;
                $score->challenge_id = $challenge->id;
                $score->log_id = $log->id;
                $score->save();
            });
    }
}
