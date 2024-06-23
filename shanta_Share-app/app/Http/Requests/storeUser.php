<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeUser extends FormRequest {
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

            'full_name'=>'required|min:6|max:100',
            'email'=>'required|email|max:100',
            'phone_number'=>'required|numeric|digits:11',
            'password'=>'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ];
    }
}
