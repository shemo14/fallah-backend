<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\Categories;
use App\Models\AppSection;
use App\Models\Events;
use App\Models\Countries;
use App\Models\Organizations;

class HomeController extends Controller
{
    public function index(){
    	$ads 			= Ads::where('status', 1)->orderBy('order', 'asc')->get();
    	$categories 	= Categories::select('name_' . lang() . ' as name', 'id', 'icon', 'image')->get();
    	$app_section 	= AppSection::select('title_' . lang() . ' as title', 'desc_' . lang() . ' as desc' , 'android', 'ios', 'desc_' . lang() . ' as desc', 'img_' . lang() . ' as image' )->find(1);
    	return view('site.index', compact('ads', 'categories', 'app_section'));
	}

	public function search(Request $request){
    	$events 		= Events::where('title_en', 'LIKE', '%' . $request['search'] . '%')->orWhere('title_ar', 'LIKE', '%' . $request['search'] . '%')->select('id', 'title_' . lang() . ' as title', 'date', 'time')->paginate(9);
    	$cities 		= Countries::select('name_' . lang() . ' as name', 'id')->get();
    	$organizations 	= Organizations::select('name_' . lang() . ' as name', 'id')->get();
    	$min_price      = Events::min('normal');
    	$max_price      = Events::max('normal');

    	return view('site.search', compact('events', 'cities', 'organizations', 'min_price', 'max_price'));
	}

	public function filter(Request $request){

	}
}
