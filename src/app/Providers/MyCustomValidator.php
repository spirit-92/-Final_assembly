<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
class MyCustomValidator extends ServiceProvider
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
        Validator::extend('uniqueRateForReader', function ($attribute, $value, $parameters, $validator) {
            $count = DB::table('baseReader')
                ->where('id_reader', $parameters[0])
                ->where('id_book',  $parameters[1])
                ->where('id_rate',  $parameters[2])
                ->count();
            return $count === 0;
        });
    }
}
