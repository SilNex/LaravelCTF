<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'score', 'privilege'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'scroe' => 'integer',
        'privilege' => 'integer',
    ];

    public function isAdmin() {
        if ($this->privilege > 9) {
            return true;
        } else {
            return false;
        }
    }

    public function scores()
    {
        return $this->hasMany('App\Score');
    }

    public function hallOfFame()
    {
        return $this->hasMany('App\hallOfFame');
    }
}
