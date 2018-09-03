<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storeupdateval extends FormRequest
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

    public function rules()
    {
        
        return [
            'name'=>'required|max:191'
            ,'quantity'=>'required|numeric|digits_between:1,5'
            ,'max'=>'required|numeric|digits_between:1,5'
            ,'min'=>'required|numeric|digits_between:1,5'
        ];
    }

    public function messages()
    {
        $de="'";
        return[
            'name.required'=>'Item name must be insert!',
            'quantity.required'=>'Item'.$de.'s quantity must be insert!',
            'max.required'=>'Item'.$de.'s max quantity must be insert!',
            'min.required'=>'Item'.$de.'s min quantity must be insert!',

            'name.max'=>'Item name may not be greater than 191 characters.!',
            'quantity.digits_between'=>'Item'.$de.'s quantity may not be greater than 5 number!',
            'max.digits_between'=>'Item'.$de.'s max quantity may not be greater than 5 number!',
            'min.digits_between'=>'Item'.$de.'s min quantity may not be greater than 5 number!'
        ];
    }
}
