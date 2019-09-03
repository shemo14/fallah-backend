<?php
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'localization'], function (){
	// language
	Route::post('set_lang'                  , 'Api\AppController@set_lang');

	// auth
	Route::post('login'                     , 'Api\AuthController@login');
	Route::post('register'                  , 'Api\AuthController@register');
	Route::post('forget_password'           , 'Api\AuthController@forget_password');
	Route::post('renew_password'            , 'Api\AuthController@renew_password');
	Route::post('active_account'            , 'Api\AuthController@active_account');

	// roles
	Route::post('roles'              		, 'Api\AppController@roles');

	// testing uploading video
	Route::post('uploading_video'           , 'Api\AppController@uploading_video');

	// about app
	Route::post('about_app'          		, 'Api\AppController@about_app');

	// contact us details
	Route::post('app_info'    		 		, 'Api\AppController@app_info');

	// send report
	Route::post('send_report'    	 		, 'Api\AppController@send_report');

	// ads
	Route::get('ads'                 		, 'Api\AdsController@ads');

	// categories
	Route::post('categories'         		, 'Api\CategoriesController@categories');

	// events
	Route::post('category_events'         	, 'Api\EventsController@category_events');
	Route::post('events_filter'             , 'Api\EventsController@events_filter');
	Route::post('event_details'             , 'Api\EventsController@event_details');
	Route::post('suggested_events'          , 'Api\EventsController@suggested_events');
	Route::post('common_events'             , 'Api\EventsController@common_events');
	Route::post('search'	                , 'Api\EventsController@search');
	Route::post('organizations_events'	    , 'Api\EventsController@organizations_events');

	// saves
	Route::post('set_save'     	        	, 'Api\SavesController@set_save');
	Route::post('saves'     	        	, 'Api\SavesController@saves');

	// countries
	Route::post('cities'		         	, 'Api\CategoriesController@cities');

	// organizations
	Route::post('organizations'		        , 'Api\CategoriesController@organizations');

	// intro
	Route::post('intro'		        		, 'Api\AppController@intro');

	Route::group(['middleware' => ['jwt']], function (){
		// User
		Route::post('user_data'              , 'Api\UserController@user_data');
		Route::post('update_profile'         , 'Api\UserController@update_profile');
		Route::post('update_password'        , 'Api\UserController@update_password');
		Route::post('logout'       			 , 'Api\UserController@logout');

		// Booking
		Route::post('booking'             	 , 'Api\BookingController@booking');
		Route::post('my_bookings'         	 , 'Api\BookingController@my_bookings');
		Route::post('ticket_details'         , 'Api\BookingController@ticket_details');
		Route::post('delete_ticket'          , 'Api\BookingController@delete_ticket');

		// Notifications
		Route::post('notifications'          , 'Api\NotifyController@notifications');
		Route::post('notification_status'    , 'Api\NotifyController@notification_status');
		Route::post('delete_notification'    , 'Api\NotifyController@delete_notification');
		Route::post('stop_notifications'     , 'Api\NotifyController@stop_notifications');
	});
});