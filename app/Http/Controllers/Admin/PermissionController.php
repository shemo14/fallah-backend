<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PermissionController extends Controller
{
    public function index()
    {
        $roles = Role::latest()->get();
        return view('dashboard.permissions.index', compact('roles'));
    }

    public function create()
    {
        return view('dashboard.permissions.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'role' => 'required|min:2|max:190'
        ]);

        $role = new Role;
        $role->role = $request->role;
        $role->save();

        $permissions = $request->permissions;
        if (count($permissions) > 0) {
            foreach ($permissions as $permission) {
                $per = new Permission();
                $per->permissions = $permission;
                $per->role_id = $role->id;
                $per->save();
            }
        }

        Session::flash('success', 'تم الحفظ');
        return response()->json(1);
    }

    public function edit($id)
    {
        $role = Role::with('Permissions')->findOrFail($id);
        return view('dashboard.permissions.update', compact('role', $role));
    }

    public function update(Request $request)
    {
        $role = Role::findOrFail($request->id);
        $role->role = $request->role;
        $role->save();

        Permission::where('role_id', $request->id)->delete();
        if (count($request->permissions) > 0) {
            foreach ($request->permissions as $per) {
                $permission = new Permission;
                $permission->permissions = $per;
                $permission->role_id = $role->id;
                $permission->save();
            }
        }

        Session::flash('success', 'تم حفظ التعديلات');
        return back();
    }

    public function destroy(Request $request)
    {
        if ($request->id != 1) {
            Role::findOrFail($request->id)->delete();
            Session::flash('success', 'تم الحذف بنجاح');
            return back();
        } else {
            Session::flash('danger', 'لا يمكن حذف هذه الصلاحيه ! ..... يمكنك تعديل الاسم فقط ');
            return back();
        }
    }
}
