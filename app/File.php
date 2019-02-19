<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $guarded = ['id'];

    public function challenge()
    {
        return $this->belongsTo('App\Challenge');
    }
}
