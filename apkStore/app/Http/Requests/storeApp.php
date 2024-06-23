<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeApp extends FormRequest {
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
            'app_name'=>'required',
            'server_id'=>'required',
            'app_version'=>'required',
            'logo'=>'required',
            'apk_file'=>'prohibited_unless:mobile,null,required_without:app_link|max:100000',
            'app_link'=>'prohibited_unless:email,null|required_without:apk_file',
            'screenshots'=>'required',
            'app_info'=>'required',
        ];
    }
}
