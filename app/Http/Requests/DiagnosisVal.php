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
            ,'pa_height'=>'required|integer|min:0'
            ,'pa_weight'=>'required|integer|min:0'
            ,'pa_discription'=>'required'
            ,'pa_sketch'=>'required|file|image|mimes:jpeg,png,gif,webp'
            ,'pa_dr'=>'required|max:191'
        ];
    }

    public function messages()
    {
        $de="'";
        return[
            'pa_name.required'=>'Patient name must be insert!',
            'pa_service.required'=>'Patient'.$de.'s Service must be insert!',
            'pa_height.required'=>'Patient'.$de.'s height must be insert!',
            'pa_weight.required'=>'Patient'.$de.'s weight must be insert!',
            'pa_discription.required'=>'Patient'.$de.'s name must be insert!',
            'pa_sketch.required'=>'Patient'.$de.'s sketch must be insert!',
            'pa_dr.required'=>'Patient'.$de.'s Consultan Doctor must be insert!',

            'pa_name.max'=>'Patient name may not be greater than 191 characters.!',
            'pa_service.max'=>'Patient'.$de.'s Service may not be greater than 191 characters!',
            'pa_dr.max'=>'Patient'.$de.'s Consultan Doctor may not be greater than 191 characters!',
            'pa_sketch.image'=>'Patient'.$de.'s sketch must be an image.!',
            
            'pa_height.min'=>'Patient'.$de.'s height may not be negative number!',
            'pa_weight.min'=>'Patient'.$de.'s weight may not be negative number!',
            'pa_height.integer'=>'Patient'.$de.'s height must be integer!',
            'pa_weight.integer'=>'Patient'.$de.'s weight must be integer!'

        ];
    }
}
