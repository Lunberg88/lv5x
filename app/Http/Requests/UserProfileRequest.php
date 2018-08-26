<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'nullable|min:3|max:20',
            'email' => 'nullable|min:5|max:30',
            'subscribe' => 'nullable',
            'password' => 'nullable|min:6|max:32',
            'new_password' => 'nullable|min:6|max:32'
        ];
    }
}
