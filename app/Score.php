<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $guarded = ['id'];

    public function challenge()
    {
        return $this->belongsTo('App\Challenge');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function log()
    {
        return $this->hasOne('App\ScoreLog');
    }

    public function giveScore(User $user, Challenge $challenge)
    {
        $log = $this->log()->create([
            'before_score' => $user->score,
            'give_point' => $challenge->point,
        ]);

        $user->update([
            'score' => $user->score + $challenge->point
        ]);

        $this->create([
            'user_id' => $user->id,
            'challenge_id' => $challenge->id,
            'log_id' => $log->id,
        ])->save();
    }
}
