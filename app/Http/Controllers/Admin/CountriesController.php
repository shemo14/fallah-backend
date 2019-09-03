<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Countries;

use Validator;
use Session;


class CountriesController extends Controller
{
    public function index(){
        $countries = Countries::get();
        return view('dashboard.countries.index', compact('countries'));
    }

    public function addCountry(Request $request){
        $add          = new Countries();
        $add->name_ar = $request['name_ar'];
        $add->name_en = $request['name_en'];

        if ($add->save()){
            addReport(auth()->user()->id, 'اضافة دولة', $request->ip());
            Session::flash('success', 'تم اضافة الدولة بنجاح');
            return back();
        }else{
            Session::flash('danger', 'لم يتم الاضافة بعد, الرجاء محاولة مره اخري');
            return back();
        }
    }

    public function updateCountry(Request $request){
        $edit           = Countries::find($request['id']);
        $edit->name_ar  = $request['name_ar'];
        $edit->name_en  = $request['name_en'];

        if ($edit->save()){
            addReport(auth()->user()->id, 'تعديل دولة ' . $request['name_ar'] , $request->ip());
            Session::flash('success', 'تم تعديل الدولة بنجاح');
            return back();
        }else{
            Session::flash('danger', 'لم يتم التعديل بعد, الرجاء محاولة مره اخري');
            return back();
        }
    }

    public function deleteCountry(Request $request){
        Countries::findOrFail($request->delete_id)->delete();
        addReport(auth()->user()->id, 'بحذف دولة', $request->ip());
        Session::flash('success', 'تم حذف الدولة بنجاح');
        return back();
    }

    public function deleteCountries(Request $request){
        $requestIds = json_decode($request->data);
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }

        if (Countries::whereIn('id', $ids)->delete()) {
            addReport(auth()->user()->id, 'قام بحذف العديد من الدول', $request->ip());
            Session::flash('success', 'تم الحذف بنجاح');
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
