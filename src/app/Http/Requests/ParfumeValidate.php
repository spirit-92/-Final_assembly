<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParfumeValidate extends FormRequest
{

    public static function rules()
    {
        return [
            'name' => 'required|unique:posts|max:255',
            'slug' => 'required',
            'description' => 'required',
            'big_img' => 'required',
            'small_img' => 'required',
            'category'=> 'required'
        ];
    }

    public function validate(array $array)
    {
        return [
            $array['name'] => 'required|unique:posts|max:255',
            $array['slug'] => 'required',
            $array['description'] => 'required',
            $array['big_img'] => 'required',
            $array['small_img'] => 'required',
            $array['category']=> 'required'
        ];
    }
}
