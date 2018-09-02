<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Qeestionval extends FormRequest
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

    public function rules()
    {
        $rpic='qu_pic';
        if($rpic==null)
            {
            return [
                'qu_title'=>'required|max:191',
                'question'=>'required'
                
            ];
   }
       else{
      return [
          'qu_title'=>'required|max:191',
        'question'=>'required'
         ,'qu_pic'=>'image|mimes:jpeg,png,gif,webp'
       ];
     }
    }

    public function messages()
    {
        $de="'";
        
        return[
            'qu_title.required'=>'Question title must be insert!',
            'question.required'=>'Question body must be insert!',

            'qu_pic.image'=>'Item'.$de.'s image must be an image.!'
        ];
        
    }
}
