<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class storeRequset extends FormRequest {
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
            'user_id'=>'required|numeric',
            'adda'=>'required|date',
            'fromcount'=>'required|min:3|max:100',
            'tocount'=>'required|min:3|max:100',
            'tocity'=>'required|min:3|max:100',
            'shwe'=>'required|numeric',
            'ndbfda'=>'required|date',
            'prlink'=>'required|string',
            'prname'=>'required|string',
            'prtype'=>'required|string',
            'prprice'=>'required|string',
            'prquan'=>'required|string',
            'primage'=>'required|image|mimes:png,jpg,gif',
            'prdet'=>'required|string',
            'atdo'=>'required|string',

        ];
    }
}
