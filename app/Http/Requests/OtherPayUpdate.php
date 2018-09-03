<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OtherPayUpdate extends FormRequest
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
            'descrption'=>'required|max:191'
            
        ];
    }

    public function messages()
    {
        $de="'";
        return[
            'descrption.required'=>'Note must be insert!',
           
            'descrption.max'=>'Note may not be greater than 191 characters.!'
        ];
    }
}

