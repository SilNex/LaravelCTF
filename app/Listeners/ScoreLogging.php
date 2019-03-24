<?php

namespace App\Listeners;

use App\Events\ScoreChange;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\ScoreLog;

class ScoreLogging
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ScoreChange  $event
     * @return void
     */
    public function handle(ScoreChange $event)
    {
        ScoreLog::create([
            'score_id' => $event->score->id,
            'before_score' => $event->user->score,
            'give_point' => $event->challenge->point,
        ]);
    }
}
