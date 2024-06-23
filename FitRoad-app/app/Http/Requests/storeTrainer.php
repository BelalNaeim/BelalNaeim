<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class storeTrainer extends FormRequest {
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
            'FullName'=>'required|min:3|max:100',
            'mobile_number'=>'required|numeric|min:11',
            'Gender'=>Rule::in( [ 'Male', 'Female' ] ),
            'Age'=>'required|numeric|max:120',
            'start_work_date'=>'date',
            'Exercise_specialties'=>'string',
            'certifcates'=>'string',
        ];
    }
}
