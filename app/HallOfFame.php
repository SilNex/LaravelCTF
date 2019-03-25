<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HallOfFame extends Model
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

    public function registeHallOfFrame(User $user, Challenge $challenge, $point)
    {
        HallOfFame::create([
            'point' => $point,
            'user_id' => $user->id,
            'challenge_id' => $challenge->id,
        ]);
    }
}
