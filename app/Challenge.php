<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{

    protected $guarded = ['id'];
    protected $hidden = ['flag'];
    protected $casts = [
        'show_at' => 'datetime',
        'point' => 'integer',
    ];

    public function file()
    {
        return $this->hasMany('App\File');
    }

    public function HallOfFame()
    {
        return $this->hasMany('App\HallOfFame');
    }

    public function score()
    {
        return $this->hasMany('App\Score');
    }

    public function content()
    {
        return $this->visible() ? $this : $this->messages('before_show_at', true);
    }

    public function status()
    {
        return $this->visible() ? 200 : 403;
    }

    public function visible()
    {
        return now() > $this->show_at;
    }

    public function messages($msgType, $returnToArray = false)
    {
        $message = __("challenge.{$msgType}", [
            'date' => $this->show_at,
            'title' => $this->title
        ]);

        return $returnToArray ? ['message' => $message] : $message;
    }

    public function checkFlag($flag)
    {
        return $this->flag === $flag;
    }

    public function giveScore(User $user)
    {
        // check solved
        $solved = $user
            ->score()
            ->whereChallengeId($this->id)->count() > 0 ? true : false;
        // or give point
        if ($solved) {
            return false;
        } else {
            $this->score()->giveScore($user, $this);
            return true;
        }
    }
}
