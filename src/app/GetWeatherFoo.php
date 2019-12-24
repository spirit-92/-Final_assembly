<?php


namespace App;

use Illuminate\Support\Facades\OptionsApi;

class GetWeatherFoo
{

    public function getWeather($name){
        $url = 'http://api.openweathermap.org/data/2.5/weather';
        $option = OptionsApi\OptionsApi::getOptionsApi();
        $option['q'] = $name;
//        $hostname = env("OPTIONS_API_WEATHER", "somedefaultvalue");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url.'?'.http_build_query($option) );
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response);
    }
}
