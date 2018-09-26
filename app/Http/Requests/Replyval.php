<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Replyval extends FormRequest
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
        $rpic='rep_pic';
        if($rpic==null)
            {
            return [
                'replye'=>'required'
                
            ];
   }
       else{
      return [
          'replye'=>'required',
        'rep_pic'=>'image|mimes:jpeg,png,gif,webp'
       ];
     }
    }

    public function messages()
    {
        return[
            'replye.required'=>'reply  must be insert!',

            'qu_pic.image'=>'Replye image must be an image.!'
        ];
        
    }
}
