<?php


namespace App\Services;


use App\Http\Requests\RegistrationRequest;
use App\Model\TokenModel;
use App\Model\UserModel;
use Illuminate\Http\Request;
use Faker;
use Illuminate\Support\Facades\Hash;

class RegistrationUserServices
{
    public function registerUser(RegistrationRequest $request)
    {
        $faker = Faker\Factory::create();
        $tokenGenerate = $faker->uuid();
        (new UserModel([
            'user_name'=>$request->username,
            'password'=>Hash::make($request->get('password')),
            'email'=>$request->email
        ]))->save();

        $user = UserModel::whereUserName($request->username)->first('user_id');

        (new TokenModel([
            'user_id' => $user['user_id'],
            'token' => $tokenGenerate,
        ]))->save();
        return response([
            'token'=>$tokenGenerate
        ],200);
    }
}
