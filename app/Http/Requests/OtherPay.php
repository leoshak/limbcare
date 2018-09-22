<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OtherPay extends FormRequest
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
            'oth_note'=>'required|max:191',
            'oth_am'=>'required|numeric|integer|min:0'
            
        ];
    }

    public function messages()
    {
        $de="'";
        return[
            'emp_name.required'=>'Note must be insert!',
           'oth_am.required'=>'Payment amount must be insert!',
           
            'emp_name.max'=>'Note may not be greater than 191 characters.!',
            'oth_am.numeric'=>'Payment amount must be number!',
            'oth_am.min'=>'Payment amount may not be negative number!'
        ];
    }
}
