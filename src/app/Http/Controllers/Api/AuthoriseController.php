<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\AuthoriseRequest;
use App\Services\AuthoriseUserServices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthoriseController extends Controller
{
    public function auth(AuthoriseRequest $request, AuthoriseUserServices $authService)
    {
        $token = $authService->auth($request);
        if ($token) {
            return response([
                'token' => $token
            ], 200);
        } else {
            return response([
                'error' => 'error request'
            ], 400);
        }
    }
}
