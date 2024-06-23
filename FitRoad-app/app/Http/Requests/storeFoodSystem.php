<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeFoodSystem extends FormRequest {
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
            'food_system_name'=>'required|min:3|max:100',
            'total_day_calories'=>'required|integer',
            'meals_number'=>'required|integer',
            'for_over_weight'=>'required|string',
            'food_system_content'=>'required|string',
        ];
    }
}
