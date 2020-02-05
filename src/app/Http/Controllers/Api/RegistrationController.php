<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\RegistrationRequest;
use App\Services\RegistrationUserServices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class RegistrationController extends Controller
{
    public function register(RegistrationRequest $request, RegistrationUserServices $user)
    {
         return $user->registerUser($request);
    }
}
