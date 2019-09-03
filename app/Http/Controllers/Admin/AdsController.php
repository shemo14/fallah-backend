<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\Images;
use App\Helpers\UploadFile;
use App\User;
use Illuminate\Support\Facades\Auth;
use Session;
use Validator;


class AdsController extends Controller
{
    public function index(){
        $ads        = Ads::get();
        return view('dashboard.ads.index', compact('ads'));
    }

    public function addAd(Request $request){
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

        $ads                    = new Ads();
        $ads->user_id           = Auth::user()->id;
        $ads->order             = $request['order'];
        $ads->status            = isset($request['status']) ? 1 : 0;

        if ($ads->save()){
            foreach ($request['images'] as $image) {
                $img        = new Images();
                $img->name  = UploadFile::uploadImage($image, 'ads');
                $img->key   = $ads->id;
                $img->type  = 'ads';
                $img->save();
            }

            addReport(auth()->user()->id, 'اضافة الاعلان', $request->ip());
            Session::flash('success', 'تم اضافة الاعلان بنجاح');
            return back();
        }else{
            Session::flash('danger', 'لم يتم الاضافة بعد, الرجاء محاولة مره اخري');
            return back();
        }
    }

    public function updateAd(Request $request){
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

        $ads                    = Ads::find($request['id']);
        $ads->user_id           = Auth::user()->id;
        $ads->order             = $request['order'];
        $ads->status            = isset($request['status']) ? 1 : 0;

        if ($ads->save()){
            if (isset($request['images'])){
                $ads->images()->delete();
                foreach ($request['images'] as $image) {
                    $img        = new Images();
                    $img->name  = UploadFile::uploadImage($image, 'ads');
                    $img->key   = $ads->id;
                    $img->type  = 'ads';
                    $img->save();
                }
            }

            addReport(auth()->user()->id, 'تعديل الاعلان', $request->ip());
            Session::flash('success', 'تم تعديل الاعلان بنجاح');
            return back();
        }else{
            Session::flash('danger', 'لم يتم الاضافة بعد, الرجاء محاولة مره اخري');
            return back();
        }
    }

    public function deleteAd(Request $request){
        Ads::findOrFail($request->delete_id)->delete();
        addReport(auth()->user()->id, 'بحذف الاعلان', $request->ip());
        Session::flash('success', 'تم حذف الاعلان بنجاح');
        return back();
    }

    public function deleteAllAds(Request $request){
        $requestIds = json_decode($request->data);
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Ads::whereIn('id', $ids)->delete()) {
            addReport(auth()->user()->id, 'قام بحذف العديد من الاعلانات', $request->ip());
            Session::flash('success', 'تم الحذف بنجاح');
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
    
    public function deleteImg($id){
        Images::find($id)->delete();
        Session::flash('success', 'تم حذف الاعلان بنجاح');
        return back();
    }
}
