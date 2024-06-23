<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeTrip extends FormRequest {
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
            'avwe'=>'required|numeric',
            'fromcount'=>'required|string|min:3|max:100',
            'fromcity'=>'required|string|min:3|max:100',
            'tdt'=>'date',
            'tocount'=>'required|string|min:3|max:100',
            'tocity'=>'required|string|min:3|max:100',
            'adt'=>'required|date',
            'notes'=>'required|string',
        ];
    }
}
