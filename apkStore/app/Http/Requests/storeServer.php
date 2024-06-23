<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeServer extends FormRequest {
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
            'name'=>'required|min:3|max:100',
            'logo'=>'required|image|mimes:png,jpg,gif',
            'server_data'=>'required|string'
        ];

    }
}
