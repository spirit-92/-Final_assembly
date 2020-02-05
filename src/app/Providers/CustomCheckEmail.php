<?php

namespace App\Providers;

namespace App\Providers;


use App\Model\UserModel;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class CustomCheckEmail extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        Validator::extend('checkEmail', function ($attribute, $value, $parameters, $validator) {
            $user = UserModel::whereUserName($parameters[0])->first();
            if ($user['email'] === $value){
                return true;
            }else{
                return false;
            }
        });
    }
}
