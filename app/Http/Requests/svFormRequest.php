<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class svFormRequest extends FormRequest
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
            'email' => 'required|email|max: 255',
        ];
    }

    public function messages(){
        return [
            'required' => 'The :attribute field is required.',
            'email' => 'The :attribute must be a valid :attribute address'
        ];
    }
}
