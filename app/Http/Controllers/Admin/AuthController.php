<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Ads;
use App\Models\Events;
use App\Models\Bookings;
use App\Models\Organizations;
use App\Models\Countries;
use App\Models\Role;
use App\Models\Report;

class AuthController extends Controller
{
    // Dashboard Page
    public function dashboard()
    {
        $users          = User::where('role', 0)->count();
        $admins         = User::where('role', 1)->count();
        $cities         = Countries::count();
        $categories     = Categories::count();
        $organizations  = Organizations::count();
        $ads            = Ads::count();
        $events         = Events::count();
        $reports        = Report::count();
        $roles          = Role::count();
        return view('dashboard.dashboard', compact('users', 'admins', 'cities', 'categories', 'organizations', 'ads', 'events', 'reports', 'roles'));
    }

    public function loginForm()
    {
        return view('dashboard.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        $rememberme = $request->rememberme == 1 ? true : false;
        if (auth()->guard()->attempt(['email' => $request->email, 'password' => $request->password], $rememberme)) {
            $user         = User::findOrFail(auth()->user()->id);
            $user->active = 1;
            $user->save();
            return redirect()->route('dashboard');
        } else {
            if (User::where('email', $request->email)->count() == 0) {
                session()->flash('error_email', 'تحقق من صحة البريد الالكتروني');
            } else {
                session()->flash('error_password', 'تحقق من صحة كلمة المرور');
            }
            return redirect()->route('loginForm');
        }
    }

    public function logout()
    {
        auth()->guard()->logout();
        return redirect('/');
    }
}
