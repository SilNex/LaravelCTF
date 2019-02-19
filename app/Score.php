<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = ['user_id', 'challenge_id','log_id'];

    public function challenge() {
        return $this->belongsTo('App\Challenge');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function log()
    {
        return $this->hasOne('App\Log');
    }
}
