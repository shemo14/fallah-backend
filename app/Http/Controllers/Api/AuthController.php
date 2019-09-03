<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\App;
use App\User;

class AuthController extends Controller
{
	public function login(Request $request){
		$rules = [
			'phone'         => 'required|exists:users,phone',
			'password'      => 'required|string',
//			'device_id'     => 'required',
		];

		$validator = validator($request->all(), $rules);

		if ($validator->fails()) {
			return returnResponse(null, validateRequest($validator), 400);
		}
		$credentials = $request->only('phone', 'password');

		try {
			if (! $token = JWTAuth::attempt($credentials)) {
				$msg = trans('apis.password');
				return returnResponse(null, $msg, 400);
			}
		} catch (JWTException $e) {
			return returnResponse(null,'could_not_create_token', 500);
		}


		$user               = auth()->user();
		$user->device_id    = $request['device_id'];
		$user->checked      = 1;
		$user->save();

		$userData      = [
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

		$msg           = trans('apis.login');
		return returnResponse($userData, $msg, 200);
	}

	public function register(Request $request){
		$rules = [
			'name'          => 'required',
			'password'      => 'required|min:6',
			 'device_id'     => 'required',
		//	'country_id'    => 'required',
			'email'         => 'required|email|unique:users,email',
			'phone'         => 'required|min:9|unique:users,phone',
		];
		App::setLocale($request['lang']);
		$validator = validator($request->all(), $rules);

		if ($validator->fails()) {
			return returnResponse(null, validateRequest($validator), 400);
		}


		$user             = new User();
		$user->name       = $request['name'];
		$user->phone      = $request['phone'];
		$user->device_id  = $request['device_id'];
		$user->lang       = $request['lang'];
		$user->email      = $request['email'];
		$user->active     = 0;
		$user->password   = bcrypt($request['password']);

		$code             = rand(1111, 9999);
		$user->code       = $code;

		if ($user->save()){
			$data['code'] 	= $user->code;
			$msg 			= trans('apis.register');
			return returnResponse($data, $msg, 200);
		}
	}

	public function active_account(Request $request){
		$rules = [
			'phone' => 'required',
		];

		$validator  = validator($request->all(), $rules);

		if ($validator->fails()) {
			return returnResponse(null, validateRequest($validator), 400);
		}

		$user = User::where('phone', $request['phone'])->first();
		if ($user){
			$user->active  = 1;
			$user->update();

			$data['id']      = $user->id;
			$msg             = trans('apis.active_account');
			return returnResponse(NULL, $msg, 200);
		}else{
			$msg = trans('apis.phone_not_found');
			return returnResponse(null, $msg, 400);
		}
	}

	public function forget_password(Request $request){
		$rules = [
			'phone' => 'required',
		];

		$validator  = validator($request->all(), $rules);

		if ($validator->fails()) {
			return returnResponse(null, validateRequest($validator), 400);
		}

		$user = User::where('phone', $request['phone'])->first();
		if ($user){
			$code        = rand(1111, 9999);
			$user->code  = $code;
			$user->update();

			$data['id']      = $user->id;
			$data['code']    = $user->code;
			$msg             = trans('apis.send_code');
			return returnResponse($data, $msg, 200);
		}else{
			$msg = trans('apis.phone_not_found');
			return returnResponse(null, $msg, 400);
		}
	}

	public function renew_password(Request $request){
		$rules = [
			'id'        => 'required',
			'password'  => 'required|min:6',
		];

		$validator  = validator($request->all(), $rules);

		if ($validator->fails()) {
			return returnResponse(null, validateRequest($validator), 400);
		}

		$user           = User::find($request['id']);
		$user->password = bcrypt($request['password']);
		$user->save();

		$msg  = trans('apis.update_password');
		return returnResponse(null, $msg, 200);
	}

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
}
