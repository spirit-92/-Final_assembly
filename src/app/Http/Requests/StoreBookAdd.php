<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookAdd extends FormRequest
{
    public $request;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    public function authorize()
    {

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

            return [
                'name' => 'required|max:10|min:3|unique:books,name',
                'authors' => 'required|exists:authors,id',
                'years' => 'required|numeric|min:1400',
                'auditions' => "required|exists:authors,id",
            ];

    }
}
