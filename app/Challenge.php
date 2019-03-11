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
        if ($this->checkVisible()) {
            return $this;
        } else {
            return $this->errorMessages('before_show_at');
        }
    }

    public function showStatus()
    {
        return $this->checkVisible() ? 200 : 403;
    }

    public function errorMessages($msgType)
    {
        return [
            "message" => __("challenge.{$msgType}", [
                'date' => $this->show_at
            ]),
        ];
    }

    public function checkVisible()
    {
        return now() > $this->show_at;
    }
}
