<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    // ============= Admins ==============

    /**
     * All Admins
     *
     * @param User $user
     * @param Role $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *          view => dashboard/users/admins.blade.php
     */
    public function index(User $user, Role $role)
    {
        $users = $user->where('role', '!=', 0)->with('Role')->latest()->get();
        $roles = $role->latest()->get();
        return view('dashboard.admins.index', compact('users'), compact('roles'));
    }

    /**
     * Add new Admin
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        // Validation rules
        $rules = [
            'name'     => 'required|min:2|max:190',
            'phone'    => 'required|unique:users,phone',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required',
            'avatar'   => 'nullable',
            'role'     => 'required',
        ];

        // Validator messages
        $messages = [
            'name.required'     => 'الاسم مطلوب',
            'name.min'          => 'الاسم لابد ان يكون اكبر من حرفين',
            'name.max'          => 'الاسم لابد ان يكون اصغر من 190 حرف',
            'phone.required'    => 'رقم الهاتف مطلوب',
            'phone.unique'      => 'رقم الهاتف موجود بالفعل',
            'email.required'    => 'البريد الالكتروني مطلوب',
            'email.unique'      => 'البريد الالكتروني موجود بالفعل',
            'email.email'       => 'تحقق من صحة البريد الالكتروني',
            'password.required' => 'كلمة السر مطلوبة',
            'role.required'     => 'الصلاحية مطلوبة',
        ];

        // Validation
        $validator = Validator::make($request->all(), $rules, $messages);

        // If failed
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        if ($request->hasFile('avatar')) {
            $avatar = UploadFile::uploadImage($request->file('avatar'), 'users');
        } else {
            $avatar = 'default.png';
        }

        // Save User
        User::create([
            'name'     => $request['name'],
            'phone'    => convert2english($request['phone']),
            'email'    => $request['email'],
            'role'     => $request['role'],
            'password' => bcrypt($request['password']),
            'avatar'   => $avatar,
        ]);

        addReport(auth()->user()->id, 'باضافة مشرف جديد', $request->ip());
        Session::flash('success', 'تم اضافة المشرف بنجاح');
        return back();
    }

    public function update(Request $request)
    {

        // Validation rules
        $rules = [
            'edit_name'  => 'required|min:2|max:190',
            'edit_phone' => 'required|unique:users,phone,' . $request->id,
            'edit_email' => 'required|email|unique:users,email,' . $request->id,
            'avatar'     => 'nullable',
            'role'       => 'required',
        ];

        // Validator messages
        $messages = [
            'edit_name.required'  => 'الاسم مطلوب',
            'edit_name.min'       => 'الاسم لابد ان يكون اكبر من حرفين',
            'edit_name.max'       => 'الاسم لابد ان يكون اصغر من 190 حرف',
            'edit_phone.required' => 'رقم الهاتف مطلوب',
            'edit_phone.unique'   => 'رقم الهاتف موجود بالفعل',
            'edit_email.required' => 'البريد الالكتروني مطلوب',
            'edit_email.unique'   => 'البريد الالكتروني موجود بالفعل',
            'edit_email.email'    => 'تحقق من صحة البريد الالكتروني',
            'role.required'       => 'الصلاحية مطلوبة',
        ];

        // Validation
        $validator = Validator::make($request->all(), $rules, $messages);

        // If failed
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $user = User::findOrFail($request->id);

        if ($request->has('avatar')) {
            if ($user->avatar != 'default.png') {
                File::delete(public_path('images/users/' . $user->avatar));
            }

            $user->avatar = UploadFile::uploadImage($request->file('avatar'), 'users');
        }

        if (isset($request->password) || $request->password != null) {
            $user->password = bcrypt($request->password);
        }

        $user->name  = $request->edit_name;
        $user->phone = convert2english($request->edit_phone);
        $user->email = $request->edit_email;
        if ($request->id != 1) {
            $user->role = $request->role;
        }
        $user->save();

        addReport(auth()->user()->id, 'بتعديل بيانات المشرف', $request->ip());
        Session::flash('success', 'تم تعديل المشرف بنجاح');
        return back();
    }

    public function delete(Request $request)
    {
        if ($request->delete_id == 1) {
            Session::flash('danger', 'لا يمكن حذف  هذا المشرف');
            return back();
        }

        if ($request->delete_id === Auth::id()) {
            Session::flash('danger', 'لا يمكن حذف العضو صاحب جلسة الدخول');
            return back();
        }

        User::findOrFail($request->delete_id)->delete();
        addReport(auth()->user()->id, 'بحذف مشرف', $request->ip());
        Session::flash('success', 'تم حذف المشرف بنجاح');
        return back();
    }

    public function deleteAllAdmins(Request $request)
    {
        $requestIds = json_decode($request->data);
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (User::whereIn('id', $ids)->delete()) {
            addReport(auth()->user()->id, 'قام بحذف العديد من المشرفين', $request->ip());
            Session::flash('success', 'تم الحذف بنجاح');
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
