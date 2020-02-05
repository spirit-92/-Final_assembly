<?php

namespace App\Http\Middleware;

use App\Model\TokenModel;
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
        if (!$token = $request->header('token')){
            return response([
                'error' => 'Unauthenticated',

            ],401);
        }
        $user = TokenModel::whereToken($token)->first();
        if (!$user){
            return response([
                'error' => 'Unauthenticated',

            ],401);
        }
        return $next($request);
    }
}
