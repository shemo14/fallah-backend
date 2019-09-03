<?php

namespace App\Http\Controllers\Admin;

use App\Models\AppSetting;
use App\Models\Social;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\AppSection;
use App\Helpers\UploadFile;


class SettingController extends Controller
{
    public function index() {
        $setting        = AppSetting::all();
        $socials        = Social::all();
        $app_section    = AppSection::find(1);
        return view('dashboard.settings.index', [
            'setting'       => $setting,
            'socials'       => $socials,
            'app_section'   => $app_section,
        ]);
    }

    public function appSection(Request $request){
        $rules = [
            'img_ar' => 'image|nullable',
            'img_en' => 'image|nullable',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $app_section            = AppSection::find(1);
        $app_section->title_ar  = $request['title_ar'];
        $app_section->title_en  = $request['title_en'];
        $app_section->desc_ar   = $request['desc_ar'];
        $app_section->desc_en   = $request['desc_en'];
        $app_section->android   = $request['android'];
        $app_section->ios       = $request['ios'];

        if ($request->hasFile('img_ar')){
            $app_section->img_ar    = UploadFile::uploadImage($request->file('img_ar'), 'appSection');
        }

        if ($request->hasFile('img_en')){
            $app_section->img_en    = UploadFile::uploadImage($request->file('img_en'), 'appSection');
        }

        if ($app_section->save()){
            $ip = $request->ip();
            addReport(auth()->user()->id, 'بتحديث بيانات التطبيق', $ip);
            Session::flash('success', 'تم تعديل بيانات التطبيق');
            return back();
        }
    }

    public function updateSiteInfo(Request $request) {

        if ($request->has('site_logo')) {

            $image = $request->file('site_logo');
            $name = 'logo.png';
            $path = public_path('/images/site');
            $image->move($path, $name);
        }

        $siteNameAr         = AppSetting::where('key', 'site_name_ar')->first();
        $siteNameAr->value  = $request->site_name_ar;
        $siteNameAr->save();

        $siteNameEn         = AppSetting::where('key', 'site_name_en')->first();
        $siteNameEn->value  = $request->site_name_en;
        $siteNameEn->save();

        $address_en         = AppSetting::where('key', 'address_en')->first();
        $address_en->value  = $request->address_en;
        $address_en->save();

        $address_ar         = AppSetting::where('key', 'address_ar')->first();
        $address_ar->value  = $request->address_ar;
        $address_ar->save();

        $phone         = AppSetting::where('key', 'phone')->first();
        $phone->value  = $request->phone;
        $phone->save();

        $email         = AppSetting::where('key', 'email')->first();
        $email->value  = $request->email;
        $email->save();

        $ip = $request->ip();
        addReport(auth()->user()->id, 'بتحديث بيانات التطبيق', $ip);
        Session::flash('success', 'تم تعديل بيانات التطبيق');
        return back();
    }

    public function aboutUs(Request $request){
        $about_ar         = AppSetting::where('key', 'about_us_ar')->first();
        $about_ar->value  = $request->about_ar;
        $about_ar->save();

        $about_en         = AppSetting::where('key', 'about_us_en')->first();
        $about_en->value  = $request->about_en;
        $about_en->save();

        $ip = $request->ip();
        addReport(auth()->user()->id, 'بتحديث بيانات التطبيق', $ip);
        Session::flash('success', 'تم تعديل بيانات التطبيق');
        return back();
    }

    public function roles(Request $request){
        $roles_en         = AppSetting::where('key', 'roles_en')->first();
        $roles_en->value  = $request->roles_en;
        $roles_en->save();

        $roles_ar         = AppSetting::where('key', 'roles_ar')->first();
        $roles_ar->value  = $request->roles_ar;
        $roles_ar->save();

        $ip = $request->ip();
        addReport(auth()->user()->id, 'بتحديث بيانات التطبيق', $ip);
        Session::flash('success', 'تم تعديل بيانات التطبيق');
        return back();
    }

    public function storeSocial(Request $request) {
        $rules = [
            'site_name' => 'required|min:2|max:190',
            'icon'      => 'required|image',
            'url'       => 'required|url',
        ];
        $messages = [
            'site_name.required'    => 'اسم الموقع مطلوب',
            'site_name.min'         => 'اسم الموقع لابد ان يكون اكتر من حرفين',
            'site_name.max'         => 'اسم الموقع لابد ان يكون اقل من 190 حرف',
            'icon.required'         => 'الشعار مطلوب',
            'icon.image'            => 'الشعار يجب ان يكون صورة',
            'url.required'          => 'الرابط مطلوب',
            'url.url'               => 'الرابط غير صحبح',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $social 			= new Social();
        $social->site_name 	= $request->site_name;
        $social->icon 		= UploadFile::uploadImage($request->file('icon'), 'socials');
        $social->url 		= $request->url;
        $social->save();

        $ip = $request->ip();

        addReport(auth()->user()->id, 'باضافة موقع تواصل جدبد', $ip);
        Session::flash('success', 'تم اضافة الموقع');
        return back();
    }

    public function updateSocial(Request $request) {
        $rules = [
            'edit_name'      => 'required|min:2|max:190',
            'edit_icon'      => 'nullable|image',
            'edit_url'       => 'required|url',
            'id'             => 'required',
        ];
        $messages = [
            'edit_name.required'    => 'اسم الموقع مطلوب',
            'edit_name.min'         => 'اسم الموقع لابد ان يكون اكتر من حرفين',
            'edit_name.max'         => 'اسم الموقع لابد ان يكون اقل من 190 حرف',
            'edit_icon.image'       => 'الشعار يجب ان يكون صورة',
            'edit_url.required'     => 'الرابط مطلوب',
            'edit_url.url'          => 'الرابط غير صحبح',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $social 			= Social::findOrFail($request->id);
        $social->site_name 	= $request->edit_name;

		if ($request->hasFile('edit_icon')){
			$social->icon 	= UploadFile::uploadImage($request->file('edit_icon'), 'socials');
		}

        $social->url 		= $request->edit_url;
        $social->save();

        $ip = $request->ip();

        addReport(auth()->user()->id, 'بتحديث موقع تواصل', $ip);
        Session::flash('success', 'تم تحديث الموقع');
        return back();
    }

    public function deleteSocial($id, Request $request) {
        Social::where('id', $id)->delete();

        $ip = $request->ip();
        addReport(auth()->user()->id, 'بحذف موقع تواصل', $ip);
        Session::flash('success', 'تم حذف الموقع');
        return back();
    }
}
