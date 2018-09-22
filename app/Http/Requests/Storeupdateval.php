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
            ,'quantity'=>'required|integer|min:0'
            ,'max'=>'required|integer|min:0'
            ,'min'=>'required|integer|min:0'
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

            'min.integer'=>'Item'.$de.'s min quantity must be integer!',
            'max.integer'=>'Item'.$de.'s max quantity must be integer!',
            'quantity.integer'=>'Item'.$de.'s min quantity must be integer!',

            'min.integer'=>'Item'.$de.'s min quantity must be integer!',
            'max.integer'=>'Item'.$de.'s max quantity must be integer!',
            'quantity.integer'=>'Item'.$de.'s min quantity must be integer!'
        ];
    }
}
