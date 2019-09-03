<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use Closure;
use Illuminate\Support\Facades\Route;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $arr = [];
        $permissions = Permission::where('role_id', auth()->user()->role)->select('permissions')->get();
        foreach ($permissions as $key => $permission) {
            $arr[$key] = $permission->permissions;
        }

        if (in_array(Route::currentRouteName(), $arr) != false) {
            return $next($request);
        } else {
            session()->flash('danger', 'لا تملك هذه الصلاحية');
            return back();
        }
    }
}
