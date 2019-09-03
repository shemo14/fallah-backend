<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Notifications;

class NotifyController extends Controller
{
	public function notifications(){
		$user_id 	   = Auth::user()->id;
		$notifications = Notifications::where('user_id', $user_id)->select('id', 'title_' . lang() . ' as title', 'body_' . lang() . ' as body', 'created_at')->get();
		$all_notifies  = [];

		foreach ($notifications as $notification) {
			$all_notifies[] = [
				'id' 	=> $notification->id,
				'title' => $notification->title,
				'body' 	=> $notification->body,
				'time'  => $notification->created_at->diffForHumans(),
			];
		}

		return returnResponse($all_notifies, '', 200);
	}

	public function delete_notification(Request $request){
		$rules = [
			'notify_id'   => 'required',
		];

		$validator  = validator($request->all(), $rules);

		if ($validator->fails()) {
			return returnResponse([], validateRequest($validator), 400);
		}

		$notify = Notifications::find($request['notify_id']);
		if ($notify->delete()){
			$msg = trans('apis.delete_notify');
			return returnResponse(null, $msg, 200);
		}
	}

	public function stop_notifications(Request $request){
		$user = Auth::user();
		$msg  = '';

		if ($user->isNotify){
			$user->isNotify = 0;
			$msg = trans('apis.stop_notify');
		}else{
			$user->isNotify = 1;
			$msg = trans('apis.run_notify');
		}

		if ($user->save()){
			return returnResponse(null, $msg, 200);
		}
	}

	public function notification_status(){
		$user = Auth::user()->isNotify;

		return returnResponse(['status' => $user ? FALSE : TRUE], '', 200);
	}
}
