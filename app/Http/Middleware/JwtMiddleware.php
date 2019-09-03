<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware
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
		try {
			$user = JWTAuth::parseToken()->authenticate();
		} catch (Exception $e) {
			if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
				return returnResponse([],'Token is Invalid', 400);
			}else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
				return returnResponse([],'Token is Expired', 400);
			}else{
				return returnResponse([],'Authorization Token not found', 400);
			}
		}
		return $next($request);
	}
}
