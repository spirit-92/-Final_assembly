<?php


namespace App\Services;


use App\Http\Requests\RegisterUserRequest;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSercvices
{
    public function store(RegisterUserRequest $request):User
    {
      $user =  new User([
            'username'=>$request->get('username'),
            'email'=>$request->get('email'),
            'password'=>Hash::make($request->get('password'))
        ]);
      $user->save();
      return $user;
    }
}
