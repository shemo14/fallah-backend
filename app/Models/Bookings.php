<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function event(){
        return $this->belongsTo('App\Models\Events', 'event_id', 'id')->select('id', 'normal', 'vip', 'date', 'gold', 'time', 'lat', 'lng', 'count', 'title_' . lang() . ' as title', 'desc_' . lang() . ' as desc', 'country_id');
    }
}
