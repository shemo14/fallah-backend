<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Hash;

class UserController extends Controller
{
	public function user_data(Request $request){
		$user           = auth()->user();
		$token          = $request->header('Authorization');
		$userData       = [
			'id'            => $user->id,
			'name'          => $user->name,
			'email'         => $user->email,
			'phone'         => $user->phone,
//			'country_id'    => $user->country_id,
			'code'          => $user->code,
			'avatar'        => url('images/users') . '/' . $user->avatar,
			'active'        => $user->active,
			'checked'       => $user->checked,
			'role'          => $user->role,
			'device_id'     => $user->device_id,
			'isNotify'      => $user->isNotify,
			'lang'          => $user->lang,
			'created_at'    => $user->created_at,
			'updated_at'    => $user->updated_at,
			'token'         => $token,
		];
		
		return returnResponse($userData, '', 200);
	}

	public function update_password(Request $request){
		$rules = [
			'old_password'  => 'required',
			'new_password'  => 'required',
		];

		$validator  = validator($request->all(), $rules);

		if ($validator->fails()) {
			return returnResponse(null, validateRequest($validator), 400);
		}

		$user = Auth::user();
		if (Hash::check($request['old_password'], $user->password)){
			$user->password = bcrypt($request['new_password']);
			$user->save();
			$msg = trans('apis.change_password');
			return returnResponse(null, $msg, 200);
		}else{
			$msg = trans('apis.old_password');
			return returnResponse(null, $msg, 400);
		}
	}

	public function update_profile(Request $request){
		$rules = [
			'name'          => 'required',
			'phone'         => 'required|digits:10|unique:users,phone,' . Auth::user()->id,
			'email'         => 'required|email|unique:users,email,'     . Auth::user()->id,
		];

		$validator  = validator($request->all(), $rules);

		if ($validator->fails()) {
			return returnResponse(null, validateRequest($validator), 400);
		}

		$user               = Auth::user();
		$user->name         = $request['name'];
		$user->email        = $request['email'];
		$user->phone        = $request['phone'];
		$user->lang         = lang();

		if ($request['image']){
			$user->avatar  = save_img_base64($request['image'], 'images/users');
		}

		$token          = $request->header('Authorization');

		if ($user->save()){
			$userData       = [
				'id'            => $user->id,
				'name'          => $user->name,
				'email'         => $user->email,
				'phone'         => $user->phone,
	//			'country_id'    => $user->country_id,
				'code'          => $user->code,
				'avatar'        => url('images/users') . '/' . $user->avatar,
				'active'        => $user->active,
				'checked'       => $user->checked,
				'role'          => $user->role,
				'device_id'     => $user->device_id,
				'isNotify'      => $user->isNotify,
				'lang'          => $user->lang,
				'created_at'    => $user->created_at,
				'updated_at'    => $user->updated_at,
				'token'         => $token,
			];

			$msg = trans('apis.profile');
			return returnResponse($userData, $msg, 200);
		}
	}

	public function logout(Request $request){
		$user               = Auth::user();
		$user->device_id    = null;

		if ($user->save()){
			$msg = 'logout successfully';
			return returnResponse(null, $msg, 200);
		}
	}
}
