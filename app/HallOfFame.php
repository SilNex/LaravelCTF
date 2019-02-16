<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HallOfFame extends Model
{
    protected $fillable = ['user_id', 'point'];
    
    public function challenge() {
        return $this->belongsTo('Challenge');
    }
}
