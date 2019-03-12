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

    public function show()
    {
        if ($this->visible()) {
            return response()
                ->json($this, 200);
        } else {
            return response()
                ->json($this->messages('before_show_at'), 403);
        }
    }

    public function visible()
    {
        return now() > $this->show_at;
    }

    public  function messages($msgType)
    {
        $message = __("challenge.{$msgType}", [
            'date' => $this->show_at
        ]);
        
        return $message;
    }
}
