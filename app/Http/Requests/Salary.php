<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Salary extends FormRequest
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
            'emp_name'=>'required|max:191',
            'emp_am'=>'required|numeric|integer|min:0'
            
        ];
    }

    public function messages()
    {
        $de="'";
        return[
            'emp_name.required'=>'Employee name must be insert!',
           'bi_am.required'=>'Bill amount must be insert!',
           
            'emp_name.max'=>'Pation name may not be greater than 191 characters.!',
            'emp_am.numeric'=>'Salary amount must be number!',
            'emp_am.min'=>'Salary amount may not be negative number!'
        ];
    }
}
