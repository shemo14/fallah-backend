<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Organizations;
use App\Models\Events;
use App\Models\Countries;
use App\Models\Categories;
use App\Models\Bookings;
use App\Models\Saves;
use App\Models\Social;
use App\Models\ContactUs;
use App\Models\Reviews;
use App\Models\Notifications;
use validator;
use App\Helpers\UploadFile;
use Hash;


class SiteController extends Controller
{
	public function lang($type){
		Session::put('locale', $type);
		return back();
	}

	public function organizations(){
		$organizations 	= Organizations::select('id', 'name_' . lang() . ' as name')->get();
		$orgIds			= Organizations::get(['id']);
		$cities 		= Countries::select('name_' . lang() . ' as name', 'id')->get();
		$eventsIds      = Reviews::where('status', 4)->get(['event_id']);
		$events         = Events::whereIn('organization_id', $orgIds)->whereIn('id', $eventsIds)->select('id', 'title_' . lang() . ' as title', 'date')->paginate(9);
		$min_price      = Events::min('normal');
		$max_price      = Events::max('normal');

		return view('site.organizations', compact('organizations', 'events', 'min_price', 'max_price', 'cities'));
	}

	public function category($id){
		$category 		= Categories::select('name_' . lang() . ' as name', 'id', 'icon')->find($id);
		$eventsIds      = Reviews::where('status', 4)->get(['event_id']);
		$events     	= Events::where('category_id', $id)->whereIn('id', $eventsIds)->select('id', 'title_' . lang() . ' as title', 'date')->paginate(9);
		$min_price  	= Events::min('normal');
		$max_price  	= Events::max('normal');
		$organizations 	= Organizations::select('id', 'name_' . lang() . ' as name')->get();
		$cities 		= Countries::select('name_' . lang() . ' as name', 'id')->get();

		return view('site.category', compact('organizations', 'events', 'min_price', 'max_price', 'cities', 'category'));
	}

	public function confirm_pay($id, $price){
		$booking 			= new Bookings();
		$booking->user_id 	= Auth::user()->id;
		$booking->price 	= $price;
		$booking->event_id 	= $id;

		if ($booking->save()){
			return view('site.confirm_pay');
		}
	}

	public function contact_us(){
		$socials = Social::get();
		return view('site.contact_us',compact('socials'));
	}

	public function send_msg(Request $request){
		$send 			= new ContactUs();
		$send->username = $request['name'];
		$send->email 	= $request['email'];
		$send->msg 		= $request['msg'];

		if ($send->save()){
			Session::flash('success', trans('site.send_msg'));
			return back();
		}
	}

	public function about_us(){
		return view('site.about_us');
	}

	public function terms(){
		return view('site.terms');
	}

	public function profile(){
		return view('site.profile');
	}

	public function edit_profile(Request $request){
		$rules = [
			'name'      => 'required|min:2|max:190',
			'phone'	    => 'required|unique:users,phone,' .  Auth::user()->id,
			'email' 	=> 'required|email|unique:users,email,' .  Auth::user()->id,
			'avatar'    => 'nullable|image'
		];
		// Validation
		$validator = validator($request->all(), $rules);

		// If failed
		if ($validator->fails()) {
			Session::flash('error', trans(validateRequest($validator)));
			return back();
		}

		$user 			= Auth::user();
		$user->name 	= $request['name'];
		$user->phone 	= $request['phone'];
		$user->email 	= $request['email'];

		if ($request->has('avatar')) {
			$user->avatar = UploadFile::uploadImage($request->file('avatar'), 'users');
		}

		if ($user->save()){
			Session::flash('success', trans('site.confirm_profile'));
			return back();
		}
	}

	public function tickets(){
		$bookings = Bookings::where('user_id', Auth::user()->id)->paginate(9);
		return view('site.tickets', compact('bookings'));
	}

	public function saves(){
		$eventsIds = Saves::where('user_id', Auth::user()->id)->get(['event_id']);
		$events    = Events::whereIn('id', $eventsIds)->select('id', 'title_' . lang() . ' as title', 'date')->paginate(9);

		return view('site.saves', compact('events'));
	}

	public function settings(){
		return view('site.settings');
	}

	public function set_settings(Request $request){
		$rules = [
			'new_password'      => 'min:6|max:190',
			'confirm_password'  => 'min:6|max:190',
		];

		// Validation
		$validator = validator($request->all(), $rules);

		// If failed
		if ($validator->fails()) {
			Session::flash('error', trans(validateRequest($validator)));
			return back();
		}

		if ($request->new_password != $request->confirm_password){
			Session::flash('error', trans('site.con_new_pass'));
			return back();
		}

		Session::put('locale', $request->lang);

		$user = Auth::user();
		if (Hash::check($request['current_password'], $user->password)){
			$user->password = bcrypt($request['new_password']);
			$user->save();

			Session::flash('success', trans('site.updated_password'));
			return back();
		}else{
			Session::flash('error', trans('site.wrong_password'));
			return back();
		}
	}

	public function register(){
		return view('site.register_one');
	}

	public function next_register(Request $request){
		$name  = $request->name;
		$email = $request->email;
		$phone = $request->phone;

		return view('site.next_register', compact('name', 'phone', 'email'));
	}

	public function home(){
		if (Auth::check()){
			if (Auth::user()->role == 1){
				return redirect('/admin');
			}
		}

		return redirect('/');
	}

	public function setSave($id){
		if (Saves::where(['event_id' => $id, 'user_id' => Auth::user()->id])->exists()){
			Saves::where(['event_id' => $id, 'user_id' => Auth::user()->id])->delete();
			return 'success un like';
		}else{
			$save              = new Saves();
			$save->event_id    = $id;
			$save->user_id     = Auth::user()->id;
			$save->save();

			return 'success like';
		}
	}

	public function fitch_events(){
		dd(Events::where('category_id', 4)->get());
	}

	public function event_filter($category_id, $city_id, $org_id, $price, $date){
		$events 	= Events::query();
		$eventsIds  = Reviews::where('status', 4)->get(['event_id']);

//		return $eventsIds;

		if ($city_id != 0){
			$events = $events->where('country_id', $city_id);
		}

		if ($org_id != 0){
			$events = $events->where('organization_id', $org_id);
		}

		if ($date != 0){
			$events = $events->where('date', $date);
		}

		if ($price != 0){
			$events = $events->where('normal', $price);
		}


		if ($category_id != 0){
			$events 	= $events->where('category_id', $category_id)->whereIn('id', $eventsIds)->select( 'id', 'title_' . lang() . ' as title', 'date', 'time', 'normal' )->get();
		}else{
			$events 	= $events->whereIn('id', $eventsIds)->select( 'id', 'title_' . lang() . ' as title', 'date', 'time', 'normal' )->get();
		}

		return view('site.filter', compact('events'));

	}

	public function notifications(){
		$notifications = Notifications::where('user_id', Auth::user()->id)->select('title_' . lang() . ' as title', 'body_' . lang() . ' as body', 'created_at')->get();
		return view('site.notifications', compact('notifications'));
	}

	public function qr_details($id, $user_id){
//		dd(Bookings::find($id)->exists());
		if (Bookings::find($id)->exists()){
			$event_id = Bookings::find($id)->event_id;
			return view('site.QR_scanner', compact('event_id'));
		}else{
			return redirect('/');
		}
	}

	public function booking_details($id){
		$booking = Bookings::find($id);
		return view('site.booking', compact('booking'));
	}

	public function delete_ticket($id){
		$booking = Bookings::find($id);
		if ($booking->delete()){
			return redirect('tickets');
		}
	}

}
