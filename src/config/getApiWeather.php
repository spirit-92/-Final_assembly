<?php
namespace Illuminate\Support\Facades\OptionsApi;


class OptionsApi{

    public static function getOptionsApi(){
       $options= [
        'q'=> '',
        'AppId'=> 'fb0244af773b2ce6caae80d7e3385cde',
        'units'=> 'metric',
        'lang'=> 'en'
    ];
       return $options;

}
}

