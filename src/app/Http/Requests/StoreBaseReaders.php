<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBaseReaders extends FormRequest
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
            'reader' => 'required|numeric|exists:readers,id',
            'book' => 'required|numeric|exists:books,id',
            'rate' => "required|numeric|max:10|uniqueRateForReader:$this->reader,$this->book,$this->rate"
        ];
    }
}
