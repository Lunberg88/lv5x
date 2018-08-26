<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidateRequest extends FormRequest
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
            'fio' => 'required|string|min:5|max:100',
            'email' => 'required|unique:users',
            'cvs' => 'nullable|min:5|max:50',
            'stack' => 'nullable|max:2',
            'tags' => 'nullable|max:150',
            'salary' => 'nullable|min:3|max:5',
            'rate' => 'nullable|min:5|max:35',
            'custom_info' => 'nullable'
        ];
    }
}
