<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Organizations;
use App\Helpers\UploadFile;
use Session;
use Validator;

class OrganizationsController extends Controller
{
    public function index(){
        $organizations = Organizations::get();
        return view('dashboard.organizations.index', compact('organizations'));
    }

    public function addOrganization(Request $request){
        // Validation rules
        $rules = [
            'icon'   => 'image'
        ];
        // Validation
        $validator = validator($request->all(), $rules);

        // If failed
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $add = new Organizations();
        $add->name_ar = $request['name_ar'];
        $add->name_en = $request['name_en'];
        $add->icon    = UploadFile::uploadImage($request->file('icon'), 'organizations');

        if ($add->save()){
            addReport(auth()->user()->id, 'اضافة هيئة', $request->ip());
            Session::flash('success', 'تم اضافة الهيئة بنجاح');
            return back();
        }else{
            Session::flash('danger', 'لم يتم الاضافة بعد, الرجاء محاولة مره اخري');
            return back();
        }
    }

    public function updateOrganization(Request $request){
        // Validation rules
        $rules = [
            'icon'   => 'nullable|image'
        ];
        // Validation
        $validator = validator($request->all(), $rules);

        // If failed
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $edit           = Organizations::find($request['id']);
        $edit->name_ar  = $request['name_ar'];
        $edit->name_en  = $request['name_en'];

        if ($request->hasFile('icon')){
            $edit->icon    = UploadFile::uploadImage($request->file('icon'), 'organizations');
        }

        if ($edit->save()){
            addReport(auth()->user()->id, 'تعديل هيئة ' . $request['name_ar'] , $request->ip());
            Session::flash('success', 'تم تعديل الهيئة بنجاح');
            return back();
        }else{
            Session::flash('danger', 'لم يتم التعديل بعد, الرجاء محاولة مره اخري');
            return back();
        }
    }

    public function deleteOrganization(Request $request){
        Organizations::findOrFail($request->delete_id)->delete();
        addReport(auth()->user()->id, 'بحذف الهيئة', $request->ip());
        Session::flash('success', 'تم حذف الهيئة بنجاح');
        return back();
    }

    public function deleteOrganizations(Request $request){
        $requestIds = json_decode($request->data);
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Organizations::whereIn('id', $ids)->delete()) {
            addReport(auth()->user()->id, 'قام بحذف العديد من الهيئات', $request->ip());
            Session::flash('success', 'تم الحذف بنجاح');
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
