<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Organizations;
use App\Models\Events;
use App\Models\Bookings;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
	public function events_filter(Request $request){
		$events = Events::query();

		if ($request['city_id']){
			$events = $events->where('country_id', $request['city_id']);
		}

		if ($request['org_id']){
			$events = $events->where('organization_id', $request['org_id']);
		}

		if ($request['date']){
			$events = $events->where('date', $request['date']);
		}

		if ($request['price']){
			$events = $events->where('normal', $request['price']);
		}

		if (isset($request->category_id)){
			$events 	= $events->where('category_id', $request['category_id'])->select( 'id', 'title_' . lang() . ' as title', 'date', 'time', 'normal' )->get();
		}else{
			$events 	= $events->select( 'id', 'title_' . lang() . ' as title', 'date', 'time', 'normal' )->get();
		}


		$all_events = [];


		foreach ($events  as $event) {
			$all_events[] = [
				'id' 	=> $event->id,
				'title' => $event->title,
				'date' 	=> $event->date,
				'time' 	=> $event->time,
				'price' => $event->normal . ' ' . trans('apis.rs'),
				'image' => url('images/events') . '/' .  $event->images()->first()->name,
			];
		}

		return returnResponse($all_events, '', 200);
	}

	public function category_events(Request $request){
		$rules = [
			'category_id'   => 'required',
		];

		$validator  = validator($request->all(), $rules);

		if ($validator->fails()) {
			return returnResponse([], validateRequest($validator), 400);
		}

		$category 	= Categories::select('name_' . lang() . ' as name', 'icon')->find($request['category_id']);
		$events 	= Events::where('category_id', $request['category_id'])->select( 'id', 'title_' . lang() . ' as title', 'date', 'time', 'normal' )->get();
		$min 		= Events::where('category_id', $request['category_id'])->min('normal');
		$max 		= Events::where('category_id', $request['category_id'])->max('normal');
		$step		= ( $max - $min ) / $min;
		$all_events = [];


		foreach ($events  as $event) {
			$all_events[] = [
				'id' 	=> $event->id,
				'title' => $event->title,
				'date' 	=> $event->date,
				'time' 	=> $event->time,
				'price' => $event->normal . ' ' . trans('apis.rs'),
				'image' => url('images/events') . '/' .  $event->images()->first()->name,
			];
		}

		$category_details = [
			'id' 	=> $request['category_id'],
			'name' 	=> $category->name,
			'icon'  => url('images/categories') . '/' . $category->icon
		];

		$data = [
			'category' => $category_details,
			'events'   => $all_events,
			'max'      => $max,
			'min'      => $min,
			'step'     => $step,
		];

		return returnResponse($data, '', 200);
	}

	public function event_details(Request $request){
		$rules = [
			'id'          => 'required',
		];

		$validator  = validator($request->all(), $rules);

		if ($validator->fails()) {
			return returnResponse(null, validateRequest($validator), 400);
		}

		if (!$request->header('Authorization') && !$request['device_id'])
			return returnResponse(null, 'plz, enter auth token or device id to set fav', 400);

		$event          = Events::select( 'id', 'title_' . lang() . ' as title', 'desc_' . lang() . ' as desc', 'date', 'time', 'normal', 'vip', 'gold', 'lat', 'lng', 'country_id' )->find($request['id']);
		$images         = $event->images()->get();
		$event_images   = [];

//		dd($event->city->id);

		foreach ($images as $image) {
			$event_images[] = [
				'url' => url('images/events') . '/' . $image->name
			];
		}

		$user_id   = null;
		$device_id = null;
		if ($request->header('Authorization')){
			$user       = JWTAuth::parseToken()->authenticate();
			$user_id    = Auth::user()->id;
		}else
			$device_id  = $request['device_id'];

		$event_details = [
			'id' 		=> $request['id'],
			'title' 	=> $event->title,
			'desc'  	=> $event->desc,
			'normal'  	=> $event->normal  	. ' ' . trans('apis.rs'),
			'vip'  		=> $event->vip 		. ' ' . trans('apis.rs'),
			'gold'  	=> $event->gold 	. ' ' . trans('apis.rs'),
			'available' => $event->count 	<= 0 ? TRUE : FALSE,
			'date'  	=> $event->date,
			'time'  	=> $event->time,
			'lat'  		=> $event->lat,
			'lng'  		=> $event->lng,
			'city'  	=> $event->city->name,
			'isLiked'   => isSaved($event->id, $user_id, $device_id),
			'images' 	=> $event_images
		];

		return returnResponse($event_details, '', 200);
	}

	public function search(Request $request){
		$events 	= Events::where('title_ar', 'LIKE', '%' . $request['search'] . '%')->orWhere('title_en', 'LIKE', '%' . $request['search'] . '%')
							->select( 'id', 'title_' . lang() . ' as title', 'date', 'time', 'normal' )->get();

		$all_events = [];
		foreach ($events as $event) {
			$all_events[] = [
				'id' 	=> $event->id,
				'title' => $event->title,
				'date' 	=> $event->date,
				'time' 	=> $event->time,
				'price' => $event->normal . ' ' . trans('apis.rs'),
				'image' => url('images/events') . '/' .  $event->images()->first()->name,
			];
		}

		return returnResponse($all_events, '', 200);
	}

	public function suggested_events(){
		$events 	= Events::select( 'id', 'title_' . lang() . ' as title', 'date', 'time', 'normal' )->orderBy('date', 'desc')->take(10)->get();
		$all_events = [];


		foreach ($events  as $event) {
			$all_events[] = [
				'id' 	=> $event->id,
				'title' => $event->title,
				'date' 	=> $event->date,
				'time' 	=> $event->time,
				'price' => $event->normal . ' ' . trans('apis.rs'),
				'image' => url('images/events') . '/' .  $event->images()->first()->name,
			];
		}


		return returnResponse($all_events, '', 200);
	}

	public function common_events(){
		$event_id = Bookings::select('event_id')
							->groupBy('event_id')
							->orderByRaw('COUNT(*) DESC')
							->distinct()
							->get(['event_id']);

		$events 	= Events::whereIn('id', $event_id)->select( 'id', 'title_' . lang() . ' as title', 'date', 'time', 'normal' )->orderBy('date', 'desc')->take(10)->get();
		$all_events = [];


		foreach ($events  as $event) {
			$all_events[] = [
				'id' 	=> $event->id,
				'title' => $event->title,
				'date' 	=> $event->date,
				'time' 	=> $event->time,
				'price' => $event->normal . ' ' . trans('apis.rs'),
				'image' => url('images/events') . '/' .  $event->images()->first()->name,
			];
		}


		return returnResponse($all_events, '', 200);
	}

	public function organizations_events(Request $request){
		$organizationId 	= Organizations::get(['id']);
		$events 			= Events::whereIn('organization_id', $organizationId)->select( 'id', 'title_' . lang() . ' as title', 'date', 'time', 'normal' )->orderBy('date', 'desc')->get();
		$min 				= Events::whereIn('organization_id', $organizationId)->min('normal');
		$max 				= Events::whereIn('organization_id', $organizationId)->max('normal');
		$step				= ( $max - $min ) / $min;
		$all_events 		= [];

		foreach ($events  as $event) {
			$all_events[] = [
				'id' 	=> $event->id,
				'title' => $event->title,
				'date' 	=> $event->date,
				'time' 	=> $event->time,
				'price' => $event->normal . ' ' . trans('apis.rs'),
				'image' => url('images/events') . '/' .  $event->images()->first()->name,
			];
		}


		$data = [
			'events' => $all_events,
			'min'	 => $min,
			'max'	 => $max,
		];

		return returnResponse($data, '', 200);

	}

}
