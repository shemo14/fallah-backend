<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\Images;

class AdsController extends Controller
{
	public function ads(Request $request){
		$ads        = Ads::get();
		$adsImage   = [];
		foreach ($ads as $ad) {
			if (isset($ad->images()->first()->name)){
				$adsImage[] = [
					'id'    => $ad->id,
					'url' => url('images/ads') . '/' . $ad->images()->first()->name
				];
			}
		}

		return returnResponse($adsImage, '', 200);
	}
}
