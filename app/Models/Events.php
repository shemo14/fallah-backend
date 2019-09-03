<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    public function city(){
        return $this->belongsTo('App\Models\Countries', 'country_id', 'id')->select('name_' . lang() . ' as name', 'id');
    }

    public function category(){
        return $this->belongsTo('App\Models\Categories', 'category_id', 'id');
    }

    public function organization(){
        return $this->belongsTo('App\Models\Organizations', 'organization_id', 'id');
    }

    public function images(){
        return $this->hasMany('App\Models\Images', 'key', 'id')->where('type', 'event');
    }

    public function bookings(){
        return $this->hasMany('App\Models\Bookings', 'event_id', 'id');
    }

    public function review(){
        return $this->hasMany('App\Models\Reviews', 'event_id', 'id');
    }

	public function save_event(){
		return $this->hasMany('App\Models\Reviews', 'event_id', 'id');
	}

}
