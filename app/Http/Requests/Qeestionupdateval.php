<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Qeestionupdateval extends FormRequest
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
        $rpic1='qurp1_pic';
        $rpic2='qurp2_pic';
        $rpic3='qurp3_pic';
        $rpic4='qurp4_pic';
        $rpic5='qurp5_pic';

        
        // if(((($rpic1==null)and($rpic2==null))and($rpic3==null))and(($rpic4==null)and($rpic5==null)))
        
        $rpic='qurp1_pic';
        if($rpic==null)
            {
            return [
                'reply1'=>'required|max:191'
            ];
   }
       else{
      return [
          'reply1'=>'required|max:191',
        'qurp1_pic'=>'image|mimes:jpeg,png,gif,webp'
       ];
     }
     
    }

    public function messages()
    {
        $de="'";
     
        return[
            'reply1.required'=>'reply 1  must be insert!',

            'reply1.max'=>'Reply 1 name may not be greater than 191 characters.!',
            'reply2.max'=>'Reply 2 name may not be greater than 191 characters.!',
            'reply3.max'=>'Reply 3 name may not be greater than 191 characters.!',
            'reply4.max'=>'Reply 4 name may not be greater than 191 characters.!',
            'reply5.max'=>'Reply 5 name may not be greater than 191 characters.!',

            'qurp1_pic.image'=>'reply 1'.$de.'s image must be an image.!',
            'qurp2_pic.image'=>'reply 2'.$de.'s image must be an image.!',
            'qurp3_pic.image'=>'reply 3'.$de.'s image must be an image.!',
            'qurp4_pic.image'=>'reply 4'.$de.'s image must be an image.!',
            'qurp5_pic.image'=>'reply 5'.$de.'s image must be an image.!'
        ];
 
    }
}
