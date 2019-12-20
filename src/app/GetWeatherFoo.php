<?php


namespace App;


class GetWeatherFoo
{

    public function getWeather($name){
        $url = 'http://api.openweathermap.org/data/2.5/weather';
        $option = array(
            'q'=> $name,
            'AppId'=> 'fb0244af773b2ce6caae80d7e3385cde',
            'units'=> 'metric',
            'lang'=> 'en'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url.'?'.http_build_query($option) );
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response);
    }
}
