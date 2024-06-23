<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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

            'first_name'=>'required|min:3|max:100',
            'last_name'=>'required|min:3|max:100',
            'Gender'=>Rule::in( [ 'Male', 'Female' ] ),
            'country'=>'required|min:3|max:100',
            'gov'=>'required|min:3|max:100',
            'city'=>'required|min:3|max:100',
            'age'=>'required|numeric|max:120',
            'weight'=>'required|numeric',
            'height'=>'required|numeric',
            'lindate'=>'date',
            'tbw'=>'required|numeric',
            'prot'=>'required|numeric',
            'mineral'=>'required|numeric',
            'bfmass'=>'required|numeric',
            'bwei'=>'required|numeric',
            'bmi'=>'required|numeric',
            'pbfat'=>'required|numeric',
            'insco'=>'required|numeric',
            'impe'=>'numeric|min:2',
            'email'=>'required|email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
            //
        ];
    }
}
