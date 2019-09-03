<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Intro;
use App\Helpers\UploadFile;
use Session;
use Validator;

class IntroController extends Controller
{
    public function index(){
        $intros = Intro::get();
        return view('dashboard.intro.index', compact('intros'));
    }

    public function addIntro(Request $request){
        // Validation rules
        $rules = [
            'image'   => 'image'
        ];
        // Validation
        $validator = validator($request->all(), $rules);

        // If failed
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $add = new Intro();
        $add->name_ar = $request['name_ar'];
        $add->name_en = $request['name_en'];
        $add->desc_ar = $request['desc_ar'];
        $add->desc_en = $request['desc_en'];
        $add->image   = UploadFile::uploadImage($request->file('image'), 'intro');

        if ($add->save()){
            addReport(auth()->user()->id, 'اضافة انترو', $request->ip());
            Session::flash('success', 'تم اضافة الانترو بنجاح');
            return back();
        }else{
            Session::flash('danger', 'لم يتم الاضافة بعد, الرجاء محاولة مره اخري');
            return back();
        }
    }

    public function updateIntro(Request $request){
        // Validation rules
        $rules = [
            'image'   => 'nullable|image'
        ];
        // Validation
        $validator = validator($request->all(), $rules);

        // If failed
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $edit           = Intro::find($request['id']);
        $edit->name_ar  = $request['name_ar'];
        $edit->name_en  = $request['name_en'];
        $edit->desc_ar  = $request['desc_ar'];
        $edit->desc_en  = $request['desc_en'];

        if ($request->hasFile('image')){
            $edit->image    = UploadFile::uploadImage($request->file('image'), 'intro');
        }

        if ($edit->save()){
            addReport(auth()->user()->id, 'تعديل الانترو ' . $request['name_ar'] , $request->ip());
            Session::flash('success', 'تم تعديل الانترو بنجاح');
            return back();
        }else{
            Session::flash('danger', 'لم يتم التعديل بعد, الرجاء محاولة مره اخري');
            return back();
        }
    }

    public function deleteIntro(Request $request){
        Intro::findOrFail($request->delete_id)->delete();
        addReport(auth()->user()->id, 'بحذف الانترو', $request->ip());
        Session::flash('success', 'تم حذف الانترو بنجاح');
        return back();
    }

    public function deleteAllIntros(Request $request){
        $requestIds = json_decode($request->data);
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Intro::whereIn('id', $ids)->delete()) {
            addReport(auth()->user()->id, 'قام بحذف العديد من الانترو', $request->ip());
            Session::flash('success', 'تم الحذف بنجاح');
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
