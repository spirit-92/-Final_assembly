<?php


namespace App\Services;


use App\Http\Requests\GetTokenReguest;

use App\User;


use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class AuthService
{
    public function getToken(GetTokenReguest $reguest){
        $user = User::whereUsername($reguest->get('username'))->first();

        if (!$user){
            return null;
        }
        if (!Hash::check($reguest->password,$user->password)){
            return null;
        }
        $token = Uuid::uuid4()->toString();
        $user->token = $token;
        $user->save();
        return $token;

    }
}
