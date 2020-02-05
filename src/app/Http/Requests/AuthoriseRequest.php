<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthoriseRequest extends FormRequest
{
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
            'username' => 'required|exists:users,user_name|max:60',
            'email' => "required|exists:users|max:160|checkEmail:$this->username",
            'password' => "required"
        ];
    }
}
