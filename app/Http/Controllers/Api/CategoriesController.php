<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Events;
use App\Models\Countries;
use App\Models\Organizations;


class CategoriesController extends Controller
{
	public function categories(Request $request){
		$categories      = Categories::select('id', 'image', 'name_' . lang() . ' as name')->get();
		$all_categories  = [];
		foreach ($categories as $category) {
			$all_categories[] = [
				'id'    => $category->id,
				'name'  => $category->name,
				'image' => url('images/categories') . '/' . $category->image
			];
		}

		return returnResponse($all_categories, '', 200);
	}

	public function cities(){
		$cities 	= Countries::select('id', 'name_' . lang() . ' as name')->get();
		$all_cities = [];

		foreach ($cities as $city) {
			$all_cities[] = [
				'id' 	=> $city->id,
				'name' 	=> $city->name
			];
		}

		return returnResponse($all_cities, '', 200);
	}

	public function organizations(){
		$organizations 		= Organizations::select('id', 'name_' . lang() . ' as name')->get();
		$all_organizations 	= [];

		foreach ($organizations as $organization) {
			$all_organizations[] = [
				'id' 	=> $organization->id,
				'name' 	=> $organization->name
			];
		}

		return returnResponse($all_organizations, '', 200);
	}

}
