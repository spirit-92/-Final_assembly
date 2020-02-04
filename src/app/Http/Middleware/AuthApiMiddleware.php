<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class AuthApiMiddleware
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
        if (!$token = $request->get('token')){
            return response([
                'error' => 'Unauthenticated',

            ],401);
        }
        $user = User::whereToken($token)->first();
        if (!$user){
            return response([
                'error' => 'Unauthenticated',

            ],401);
        }
        return $next($request);
    }
}
