<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceVal extends FormRequest
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
            'service_name'=>'required|max:191',
            'service_type'=>'required',
            'service_image'=>'required|file|image|mimes:jpeg,png,gif,webp',
            'service_des'=>'required'
            
        ];
    }
    
    public function messages()
    {
        $de="'";
        return[
            'service_name.required'=>'service name must be insert!',
            'service_des.required'=>'service'.$de.'s discription must be insert!',
            'service_image.required'=>'service'.$de.'s image must be insert!',

            'service_name.max'=>'service name may not be greater than 191 characters.!',
            
            'service_image.image'=>'service'.$de.'s image must be an image.!'
        ];
    }
}
