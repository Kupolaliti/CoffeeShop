<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdressRequest extends FormRequest
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
            'state'=>'required|max:50px',
            'city'=>'required|max:50px',
            'postCode'=>'required|digits:6',
            'adressLine'=>'required|max:70px',
            'user_id'=>'required',
        ];
    }
}