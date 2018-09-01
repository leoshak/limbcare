<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiagnosisVal extends FormRequest
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
            'pa_name'=>'required|max:191',
            'pa_service'=>'required|max:191'
            ,'pa_height'=>'required|numeric|digits_between:2,3'
            ,'pa_weight'=>'required|max:5'
            ,'pa_discription'=>'required'
            ,'pa_sketch'=>'required|file|image|mimes:jpeg,png,gif,webp'
            ,'pa_dr'=>'required|max:191'
        ];
    }

    public function messages()
    {
        $de="'";
        return[
            'pa_name.required'=>'Pation name must be insert!',
            'pa_service.required'=>'Pation'.$de.'s Service must be insert!',
            'pa_height.required'=>'Pation'.$de.'s height must be insert!',
            'pa_weight.required'=>'Pation'.$de.'s weight must be insert!',
            'pa_discription.required'=>'Pation'.$de.'s name must be insert!',
            'pa_sketch.required'=>'Pation'.$de.'s sketch must be insert!',
            'pa_dr.required'=>'Pation'.$de.'s Consultan Doctor must be insert!',

            'pa_name.max'=>'Pation name may not be greater than 191 characters.!',
            'pa_service.max'=>'Pation'.$de.'s Service may not be greater than 191 characters!',
            'pa_height.digits_between'=>'Pation'.$de.'s height may not be greater than 3 number!',
            'pa_weight.digits_between'=>'Pation'.$de.'s weight may not be greater than 3 number!',
            'pa_dr.max'=>'Pation'.$de.'s Consultan Doctor may not be greater than 191 characters!',
            'pa_sketch.image'=>'Pation'.$de.'s sketch must be an image.!'
        ];
    }
}
