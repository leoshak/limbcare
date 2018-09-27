<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Invoiceval extends FormRequest
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
            'Service'=>'required'
            ,'amount'=>'required|numeric|integer|min:0'
            
        ];
    }

    public function messages()
    {
        $de="'";
        return[
            'Service.required'=>'Service name must be insert!',
            'amount.required'=>'Bill amount must be insert!',
           
            'amount.numeric'=>'Bill amount must be number!',
            'amount.min'=>'Bill amount may not be negative number!'
        ];
    }
}

