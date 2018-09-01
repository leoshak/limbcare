<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storeval extends FormRequest
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
            'it_name'=>'required|max:191',
            'it_company'=>'required|max:191'
            ,'it_quantity'=>'required|numeric|digits_between:1,5'
            ,'it_max'=>'required|numeric|digits_between:1,5'
            ,'it_min'=>'required|numeric|digits_between:1,5'
            ,'it_pic'=>'required|file|image|mimes:jpeg,png,gif,webp'
        ];
    }

    public function messages()
    {
        $de="'";
        return[
            'it_name.required'=>'Item name must be insert!',
            'it_company.required'=>'Item'.$de.'s company must be insert!',
            'it_quantity.required'=>'Item'.$de.'s quantity must be insert!',
            'it_max.required'=>'Item'.$de.'s max quantity must be insert!',
            'it_min.required'=>'Item'.$de.'s min quantity must be insert!',
            'it_pic.required'=>'Item'.$de.'s image must be insert!',

            'it_name.max'=>'Item name may not be greater than 191 characters.!',
            'it_company.max'=>'Item'.$de.'s company may not be greater than 191 characters!',
            'it_quantity.digits_between'=>'Item'.$de.'s quantity may not be greater than 5 number!',
            'it_max.digits_between'=>'Item'.$de.'s max quantity may not be greater than 5 number!',
            'it_min.digits_between'=>'Item'.$de.'s min quantity may not be greater than 5 number!',

            'it_pic.image'=>'Item'.$de.'s image must be an image.!'
        ];
    }
}
