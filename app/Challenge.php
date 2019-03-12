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
            return response()
            ->json($this, $this->showStatus());
        } else {
            return $this->messages('before_show_at', true);
        }
    }

    public function showStatus()
    {
        return $this->checkVisible() ? 200 : 403;
    }

    public  function messages($msgType, $returnToArray = false)
    {
        $message = __("challenge.{$msgType}", [
            'date' => $this->show_at
        ]);

        if ($returnToArray) {
            return [
                "message" => $message,
            ];
        } else {
            return $message;
        }
    }

    public function checkVisible()
    {
        return now() > $this->show_at;
    }
}
