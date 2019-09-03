<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Helpers\UploadFile;
use Session;
use Validator;


class CategoriesController extends Controller
{
    public function index(){
        $categories = Categories::get();
        return view('dashboard.categories.index', compact('categories'));
    }

    public function addCategory(Request $request){
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

        $add = new Categories();
        $add->name_ar = $request['name_ar'];
        $add->name_en = $request['name_en'];
        $add->image   = $avatar = UploadFile::uploadImage($request->file('image'), 'categories');
        $add->icon    = $avatar = UploadFile::uploadImage($request->file('icon'), 'categories');

        if ($add->save()){
            addReport(auth()->user()->id, 'اضافة قسم', $request->ip());
            Session::flash('success', 'تم اضافة القسم بنجاح');
            return back();
        }else{
            Session::flash('danger', 'لم يتم الاضافة بعد, الرجاء محاولة مره اخري');
            return back();
        }
    }

    public function updateCategory(Request $request){
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

        $edit           = Categories::find($request['id']);
        $edit->name_ar  = $request['name_ar'];
        $edit->name_en  = $request['name_en'];

        if ($request->hasFile('image')){
            $edit->image    = $avatar = UploadFile::uploadImage($request->file('image'), 'categories');
        }

        if ($request->hasFile('icon')){
            $edit->icon    = $avatar = UploadFile::uploadImage($request->file('icon'), 'categories');
        }

        if ($edit->save()){
            addReport(auth()->user()->id, 'تعديل قسم ' . $request['name_ar'] , $request->ip());
            Session::flash('success', 'تم تعديل القسم بنجاح');
            return back();
        }else{
            Session::flash('danger', 'لم يتم التعديل بعد, الرجاء محاولة مره اخري');
            return back();
        }
    }

    public function deleteCategory(Request $request){
        Categories::findOrFail($request->delete_id)->delete();
        addReport(auth()->user()->id, 'بحذف القسم', $request->ip());
        Session::flash('success', 'تم حذف القسم بنجاح');
        return back();
    }

    public function deleteAllCategories(Request $request){
        $requestIds = json_decode($request->data);
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Categories::whereIn('id', $ids)->delete()) {
            addReport(auth()->user()->id, 'قام بحذف العديد من الاقسام', $request->ip());
            Session::flash('success', 'تم الحذف بنجاح');
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
