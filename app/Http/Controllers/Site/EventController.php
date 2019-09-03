<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Models\Saves;

class EventController extends Controller
{
    public function event($id){
		$event  	= Events::select( 'id', 'title_' . lang() . ' as title', 'desc_' . lang() . ' as desc', 'date', 'time', 'normal', 'vip', 'gold', 'lat', 'lng', 'country_id' )->find($id);
		$images 	= $event->images()->get();
		$isSaved 	= Saves::where('event_id', $id)->exists() ? TRUE : FALSE;

		return view('site.event', compact('event', 'images', 'isSaved'));
	}
}
