<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    public function images(){
        return $this->hasMany('App\Models\Images', 'key', 'id')->where('type', 'ads');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
