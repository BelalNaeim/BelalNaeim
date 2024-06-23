<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeMoney extends FormRequest {
    /**
    * Determine if the user is authorized to make this request.
    *
    * @return bool
    */

    public function authorize() {
        return true;
    }

    /**
    * Get the validation rules that apply to the request.
    *
    * @return array<string, mixed>
    */

    public function rules() {
        return [
            //
            'moneyName'=>'required|min:3|max:100',
            'faceImage'=>'required|image|mimes:png,jpg,gif',
            'backImage'=>'required|image|mimes:png,jpg,gif',
            'moneyNameVoice'=>'required|mimes:mp3,mpeg,wav,ogg',
            'algorithms'=>'unique:monies'
        ];
    }
}
