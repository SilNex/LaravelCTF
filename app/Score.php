<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = ['user_id', 'challenge_id','log_id'];

    public function score() {
        return $this->belongsTo('App\Score');
    }
}
