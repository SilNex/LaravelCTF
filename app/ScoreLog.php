<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScoreLog extends Model
{
    protected $guarded = ['id'];

    public function score()
    {
        return $this->belongsTo('App\Score');
    }
}
