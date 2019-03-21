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

    public function scoreLog()
    {
        return $this->hasMany('App\ScoreLog');
    }

    public static function giveScore(User $user, Challenge $challenge)
    {
        $score = Score::create([
            'user_id' => $user->id,
            'challenge_id' => $challenge->id,
        ]);
        
        ScoreLog::create([
            'score_id' => $score->id,
            'before_score' => $user->score,
            'give_point' => $challenge->point,
        ]);

        $user->update([
            'score' => $user->score + $challenge->point
        ]);

    }
}
