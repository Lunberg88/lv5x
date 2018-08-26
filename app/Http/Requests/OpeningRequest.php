<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OpeningRequest extends FormRequest
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
            'title' => 'required|min:5',
            'description' => 'required|min:15',
            'location' => 'nullable|min:5|max:60',
            'salary' => 'nullable|min:3|max:5',
            'rate' => 'nullable|min:3|max:20',
            'status' => 'nullable|boolean',
            'type' => 'nullable|boolean'
        ];
    }
}
