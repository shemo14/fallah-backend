<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Social;
use App\Models\ContactUs;
use App\Models\Intro;
use Illuminate\Support\Facades\App;
use App\Helpers\UploadFile;
use Session;
use Carbon\Carbon;
use App\Models\Images;



class AppController extends Controller
{
	public function roles(){
		$roles       = 'roles_' . lang();
		$roles_title = 'roles_title_' . lang();
		return returnResponse(['roles_title' => settings($roles_title), 'roles' => settings($roles)], '', 200);
	}

	public function about_app(){
		$about_us       = 'about_us_' . lang();
		$about_us_title = 'about_title_' . lang();
		return returnResponse(['about_title' => settings($about_us_title), 'about' => settings($about_us)], '', 200);
	}

	public function app_info(Request $request){
		$socials    = Social::get();
		$allSocials = [];

		foreach ($socials as $social) {
			$allSocials[] = [
				'name' => $social->site_name,
				'logo' => url('images/socials') . '/' . $social->icon,
				'url'  => $social->url,
			];
		}

		$info = [
			'phone'     => settings('phone'),
			'email'     => settings('email'),
			'address'   => settings('address_' . $request['lang']),
		];

		$data = [
			'contact_title' => settings('contact_title_' . $request->lang),
			'info'      	=> $info,
			'socials'   	=> $allSocials
		];

		return returnResponse($data, '', 200);
	}

	public function send_report(Request $request){

		$rules = [
			'username'  => 'required',
			'email'   	=> 'required|email',
			'msg'     	=> 'required',
		];

		$validator  = validator($request->all(), $rules);

		if ($validator->fails()) {
			return returnResponse([], validateRequest($validator), 400);
		}

		$contact        	= new ContactUs();
		$contact->username  = $request['username'];
		$contact->email 	= $request['email'];
		$contact->msg   	= $request['msg'];

		if ($contact->save()){
			$msg = trans('apis.report');
			return returnResponse(null, $msg, 200);
		}

	}

	public function set_lang(Request $request){
		Session::put('locale', $request['lang']);
		return returnResponse(null, trans('apis.set_language'), 200);
	}

	public function intro(Request $request){
		$intros 	= Intro::select('id', 'name_' . lang() . ' as name', 'desc_' . lang() . ' as desc', 'image')->get();
		$all_intros = [];

		foreach ($intros as $intro) {
			$all_intros[] = [
				'id' 	=> $intro->id,
				'name' 	=> $intro->name,
				'desc' 	=> $intro->desc,
				'image' =>  url('images/intro') . '/' . $intro->image,
			];
		}

		return returnResponse($all_intros, '', 200);
	}

	public function uploading_video(Request $request){
//		dd($request->file('video'));
		$upload 		= new Images();
		$upload->key 	= 100;
		$upload->type 	= 'test';
		$upload->name 	= UploadFile::uploadImage($request->file('video'), 'categories');

		if ($upload->save()){
			return returnResponse(null, 'uploaded successfully', 200);
		}
	}
}
