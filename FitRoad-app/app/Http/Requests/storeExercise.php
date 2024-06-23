<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeExercise extends FormRequest {
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
            'exercise_name'=>'required|min:3|max:100',
            'Duration'=>'required|integer',
            'burned_calories'=>'required|integer',
            'for_over_weight'=>'required|integer',
            'target_body_area'=>'required|in:Chest,Back,Arms,Abdominals,Sholuders,Legs',
            'exercise_video'=>'required|mimes:mp4,mov,ogg,qt|max:20000'
        ];
    }
}
