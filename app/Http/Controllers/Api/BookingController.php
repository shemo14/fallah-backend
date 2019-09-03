<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bookings;
use App\Models\Events;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function booking(Request $request){
		$rules = [
			'id'          => 'required',
			'price'       => 'required',
		];

		$validator  = validator($request->all(), $rules);

		if ($validator->fails()) {
			return returnResponse(null, validateRequest($validator), 400);
		}

		$booking 			= new Bookings();
		$booking->user_id   = Auth::user()->id;
		$booking->event_id  = $request->id;
		$booking->price     = $request->price;

		if ($booking->save()){
			$msg = trans('apis.booking');
			return returnResponse(['booking_id' => $booking->id], $msg, 200);
		}
	}

	public function my_bookings(){
    	$user_id 	= Auth::user()->id;
    	$bookings 	= Bookings::where('user_id', $user_id)->get();

		$all_events = [];
		$dates		= [];
		foreach ($bookings as $booking) {
			$all_events[] = [
				'booking_id'   	  => $booking->id,
				'event_id'   	  => $booking->event_id,
				'title'   		  => $booking->event->title,
				'image'   		  => url('images/events') . '/' . $booking->event->images()->first()->name,
				'date'    		  => Carbon::parse($booking->event->date)->format('M d')
			];

			$dates[] = [
				Carbon::parse($booking->event->date)->format('M d')
			];
		}

//		$dat = array_unique($dates);

		$data = [
			'events' => $all_events,
			'dates'  => $dates,
		];

		return returnResponse($data, '', 200);
	}

	public function ticket_details(Request $request){
		$rules = [
			'booking_id'          => 'required',
		];

		$validator  = validator($request->all(), $rules);

		if ($validator->fails()) {
			return returnResponse(null, validateRequest($validator), 400);
		}

		$booking = Bookings::find($request->booking_id);

		$remain = NULL;


		if (!Carbon::parse($booking->event->date)->isPast()){
			$date = Carbon::parse($booking->event->date);
			$now  = Carbon::now();

			$remain = $date->diffInDays($now);
		}

		$data = [
			'booking_id'   	  => $booking->id,
			'event_id'   	  => $booking->event_id,
			'title'   		  => $booking->event->title,
			'desc'   		  => $booking->event->desc,
			'price'   		  => $booking->price . ' ' . trans('apis.rs'),
			'image'   		  => url('images/events') . '/' . $booking->event->images()->first()->name,
			'date'    		  => Carbon::parse($booking->event->date)->format('M d'),
			'no_date'    	  => $booking->event->date,
			'time'    		  => $booking->event->time,
			'city'    		  => 'eh el 7alawa dy ya koko',
			'remain'    	  => $remain . ' ' . trans('apis.days')
		];


		return returnResponse($data, '', 200);
	}

	public function delete_ticket(Request $request){
		$rules = [
			'booking_id'          => 'required',
		];

		$validator  = validator($request->all(), $rules);

		if ($validator->fails()) {
			return returnResponse(null, validateRequest($validator), 400);
		}


    	$booking = Bookings::find($request->booking_id);
		if ($booking->delete()){
			$msg = trans('apis.delete_ticket');
			return returnResponse(NULL, $msg, 200);
		}
	}
}
