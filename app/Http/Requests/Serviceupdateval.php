<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Serviceupdateval extends FormRequest
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
            'name'=>'required|max:191',
            'discription'=>'required'
        ];
    }
    public function messages()
    {
        $de="'";
        return[
            'name.required'=>'service name must be insert!',
            'discription.required'=>'service'.$de.'s discription must be insert!',
            
            'name.max'=>'service name may not be greater than 191 characters.!'];
    }
}
