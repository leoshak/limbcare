<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiagnosisValUpdate extends FormRequest
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
            'name'=>'required|max:191'
            ,'hight'=>'required|numeric|digits_between:2,3'
            ,'Weight'=>'required|max:5'
            ,'discription'=>'required'
        ];
    }

    public function messages()
    {
        $de="'";
        return[
            'name.required'=>'Pation name must be insert!',
            'hight.required'=>'Pation'.$de.'s height must be insert!',
            'Weight.required'=>'Pation'.$de.'s weight must be insert!',
            'discription.required'=>'Pation'.$de.'s name must be insert!'
            ,
            'name.max'=>'Pation name may not be greater than 191 characters.!',
            'hight.digits_between'=>'Pation'.$de.'s height may not be greater than 3 number!',
            'Weight.digits_between'=>'Pation'.$de.'s weight may not be greater than 3 number!'
        ];
    }
}
