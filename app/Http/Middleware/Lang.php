<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use Carbon\Carbon;

class Lang
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
		Carbon::setLocale(Session::has('locale') ? Session::get('locale') : 'en');
		App::setLocale(Session::has('locale') ? Session::get('locale') : 'en');
		
        return $next($request);
    }
}
