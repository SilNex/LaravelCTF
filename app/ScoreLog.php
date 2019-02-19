<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScoreLog extends Model
{
    protected $fillable = ['before_score', 'give_point'];

    public function score()
    {
        return $this->belongsTo('App\Score');
    }
}
