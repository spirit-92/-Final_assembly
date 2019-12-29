<?php


namespace App\services;


class Parfume
{
    public static function getPerfumes( array $parfum){
        $saveParfume = [
            'name' => $parfum['name'],
            'slug' => $parfum['slug'],
            'description'=> $parfum['description'],
            'big_icon'=> $parfum['big_icon'],
            'small_icon'=>$parfum['small_icon'],
            'category'=>$parfum['category']
    ];
       var_dump($saveParfume);
 }
}
