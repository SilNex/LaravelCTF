<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $guarded = ['id'];

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
