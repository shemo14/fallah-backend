<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Saves;
use App\Models\Events;
use JWTAuth;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SavesController extends Controller
{
	public function set_save(Request $request){
		$rules = [
			'event_id'    => 'required',
		];

		$validator  = validator($request->all(), $rules);

		if ($validator->fails()) {
			return returnResponse(null, validateRequest($validator), 400);
		}

		if (!$request->header('Authorization') && !$request['device_id'])
			return returnResponse(null, 'plz, enter auth token or device id to set save', 400);

		$save_msg     = trans('apis.save');
		$unsave_msg   = trans('apis.unsave');

		if ($request->header('Authorization')){  // if user auth...
			$user         = JWTAuth::parseToken()->authenticate();

			if (Saves::where(['event_id' => $request['event_id'], 'user_id' => $user->id])->exists()){
				Saves::where(['event_id' => $request['event_id'], 'user_id' => $user->id])->delete();
				return returnResponse(null, $unsave_msg, 200);
			}else{
				$save              = new Saves();
				$save->event_id    = $request['event_id'];
				$save->user_id     = Auth::user()->id;
				$save->save();

//				$user_id = Products::where('id', $request['event_id'])->first()->user_id;
//				set_notification($user_id, null,$request['event_id'], $fav->id, null, 4, $request['lang'], null, null);

				return returnResponse(null, $save_msg, 200);
			}

		}else{  // if user guest
			if (Saves::where(['event_id' => $request['event_id'], 'device_id' => $request['device_id']])->exists()){
				Saves::where(['event_id' => $request['event_id'], 'device_id' => $request['device_id']])->delete();
				return returnResponse(null, $unsave_msg, 200);
			}else{
				$save                = new Saves();
				$save->product_id    = $request['event_id'];
				$save->device_id     = $request['device_id'];
				$save->save();

//				$user_id = Products::where('id', $request['event_id'])->first()->user_id;
//				set_notification($user_id, null,$request['event_id'], $fav->id, null, 4, lang(), null, null);

				return returnResponse(null, $save_msg, 200);
			}
		}
	}

	public function saves(Request $request){
		Carbon::setLocale('ar');
		if (!$request->header('Authorization') && !$request['device_id'])
			return returnResponse(null, 'plz, enter auth token or device id to set fav', 400);


		if ($request->header('Authorization')){  // if user auth...
			$user         = JWTAuth::parseToken()->authenticate();
			$eventsIds    = Saves::where('user_id', $user->id)->get(['event_id']);
			$events		  = Events::select('id', 'title_' . lang() . ' as title')->whereIn('id', $eventsIds)->get();
		}else{  // if user guest
			$eventsIds    = Saves::where('device_id', $request['device_id'])->get(['event_id']);
			$events       = Events::select('id', 'title_' . lang() . ' as title')->whereIn('id', $eventsIds)->get();
		}

		$all_events 	  = [];
		foreach ($events as $event) {
			$all_events[] = [
				'id'   	  => $event->id,
				'title'   => $event->title,
				'image'   => url('images/events') . '/' . $event->images()->first()->name,
				'date'    => Carbon::parse($event->date)->format('M d')
			];
		}

		return returnResponse($all_events, '', 200);
	}
}
