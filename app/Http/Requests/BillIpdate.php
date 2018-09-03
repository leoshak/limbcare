<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillIpdate extends FormRequest
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
            'patientname'=>'required|max:191',
            'descrption'=>'required|max:191'
            
        ];
    }

    public function messages()
    {
        $de="'";
        return[
            'patientname.required'=>'Pation name must be insert!',
            'descrption.required'=>'Bill note must be insert!',
           
            'patientname.max'=>'Pation name may not be greater than 191 characters.!',
            'descrption.max'=>'Bill note may not be greater than 191 characters!'
        ];
    }
}

