<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $guarded = ['id'];
    protected $hidden = ['flag'];

    public function file()
    {
        return $this->hasMany('App\File');
    }

    public function HallOfFame()
    {
        return $this->hasMany('App\HallOfFame');
    }
}
