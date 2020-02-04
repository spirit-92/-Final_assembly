<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\GetTokenReguest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    public function getToken(GetTokenReguest $reguest,AuthService $service){
       $token = $service->getToken($reguest);

       if (!$token){
           return response([
               'error'=>'Bad request'
           ],400);
       }
       return[
           'token' => $token
       ];
    }
}
