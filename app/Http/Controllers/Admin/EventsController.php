<?php

namespace App\Http\Controllers\Admin;

use App\Models\Countries;
use App\Models\Images;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Models\Organizations;
use App\Models\Categories;
use App\Models\Reviews;
use App\Helpers\UploadFile;
use Illuminate\Support\Facades\Auth;
use Session;
use Validator;

class EventsController extends Controller
{
    public function index(){
        $events         = Events::get();
        $organizations  = Organizations::get();
        $categories     = Categories::get();
        $cities         = Countries::get();
        return view('dashboard.events.index', compact('events', 'organizations', 'categories', 'cities'));
    }

    public function addEvent(Request $request){
        // Validation rules
        $rules = [
            'images'     => 'array',
            'images.*'   => 'mimes:mp4,avi,quicktime,jpeg,bmp,png',
        ];
        // Validation
        $validator = validator($request->all(), $rules);

        // If failed
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $event                  = new Events();
        $event->title_ar        = $request['name_ar'];
        $event->title_en        = $request['name_en'];
        $event->desc_ar         = $request['desc_ar'];
        $event->desc_en         = $request['desc_en'];
        $event->count           = $request['count'];
        $event->time            = $request['time'];
        $event->date            = $request['date'];
        $event->normal          = $request['normal'];
        $event->vip             = $request['vip'];
        $event->gold            = $request['gold'];
        $event->lat             = $request['lat'];
        $event->lng             = $request['lng'];
        $event->country_id      = $request['city_id'];
        $event->category_id     = $request['category_id'];
        $event->organization_id = $request['organization_id'];
        $event->max_order       = $request['max_order'];
        $event->normal_num      = $request['normal_num'];
        $event->gold_num        = $request['gold_num'];
        $event->vip_num         = $request['vip_num'];

        if ($event->save()){
            foreach ($request['images'] as $image) {
                $img        = new Images();
                $img->key   = $event->id;
                $img->type  = 'event';
                $img->name  = UploadFile::uploadImage($image, 'events');
                $img->save();
            }

            $review                 = new Reviews();
            $review->event_id       = $event->id;
            $review->created_by     = Auth::user()->id;

            if (Auth::user()->role == 1)
				$review->status     	= 4;

            $review->save();

            addReport(auth()->user()->id, 'اضافة مناسبة', $request->ip());
            Session::flash('success', 'تم اضافة المناسبة بنجاح');
            return back();
        }else{
            Session::flash('danger', 'لم يتم الاضافة بعد, الرجاء محاولة مره اخري');
            return back();
        }
    }
    
    public function reviewEvents(Request $request){
        $review         = Reviews::find($request['id']);
        $review->status = 1;
        $review->notes  = $request['notes'];

        if ($review->save()){
            Session::flash('success', 'تم رفض المناسبة بنجاح');
            return back();
        }
    }

    public function acceptEvents($id){
        $review         = Reviews::where('event_id', $id)->first();
        $review->status = Auth::user()->role == 1 ? 3 : 2;

        if ($review->save()){
            Session::flash('success', 'تم قبول المناسبة بنجاح');
            return back();
        }
    }

    public function updateEvent(Request $request){
        $rules = [
            'images'     => 'nullable|array',
            'images.*'   => 'mimes:mp4,avi,quicktime,jpeg,bmp,png',
        ];
        $validator = validator($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $event                  = Events::find($request['id']);
        $event->title_ar        = $request['name_ar'];
        $event->title_en        = $request['name_en'];
        $event->desc_ar         = $request['desc_ar'];
        $event->desc_en         = $request['desc_en'];
        $event->count           = $request['count'];
        $event->time            = $request['time'];
        $event->date            = $request['date'];
        $event->normal          = $request['normal'];
        $event->vip             = $request['vip'];
        $event->gold            = $request['gold'];
        $event->lat             = $request['lat'];
        $event->lng             = $request['lng'];
        $event->country_id      = $request['city_id'];
        $event->category_id     = $request['category_id'];
        $event->organization_id = $request['organization_id'];
        $event->max_order       = $request['max_order'];
        $event->normal_num      = $request['normal_num'];
        $event->gold_num        = $request['gold_num'];
        $event->vip_num         = $request['vip_num'];


        if ($request->hasFile('images')){
            foreach ($request['images'] as $image) {
                $img        = new Images();
                $img->key   = $event->id;
                $img->type  = 'event';
                $img->name  = UploadFile::uploadImage($image, 'events');
                $img->save();
            }
        }

        if ($event->save()){

            $review                 = Reviews::where('event_id', $event->id)->first();
            $review->status         = Auth::user()->role == 1 ? 4 :  0;
            $review->save();

            addReport(auth()->user()->id, 'تعديل المناسبة ' . $request['name_ar'] , $request->ip());
            Session::flash('success', 'تم تعديل المناسبة بنجاح');
            return back();
        }else{
            Session::flash('danger', 'لم يتم التعديل بعد, الرجاء محاولة مره اخري');
            return back();
        }
    }

    public function deleteEvent(Request $request){
        Events::findOrFail($request->delete_id)->delete();
        addReport(auth()->user()->id, 'بحذف المناسبة', $request->ip());
        Session::flash('success', 'تم حذف المناسبة بنجاح');
        return back();
    }

    public function deleteEvents(Request $request){
        $requestIds = json_decode($request->data);
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Events::whereIn('id', $ids)->delete()) {
            addReport(auth()->user()->id, 'قام بحذف العديد من الهيئات', $request->ip());
            Session::flash('success', 'تم الحذف بنجاح');
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
