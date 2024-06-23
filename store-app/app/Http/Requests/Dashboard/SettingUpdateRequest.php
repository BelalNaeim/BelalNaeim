<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class SettingUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'name'=>'required|string',
            'description'=>'required|string',
            'email'=>'required|email',
            'phone'=>'required|numeric|min:11',
            'address'=>'required|string',
            'logo'=>'image',
            'favicon'=>'image',
            'facebook'=>'required|string',
            'twitter'=>'required|string',
            'instagram'=>'required|string',
            'youtube'=>'required|string',
            'tiktok'=>'required|string',
        ];
    }
}
