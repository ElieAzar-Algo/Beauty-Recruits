<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyValidator extends FormRequest
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
            'username',
            'email' => 'email|unique:applicants',
            'password',
            'name',
            'introduction',
            'location',
            'phone',
            'website',
            'verified',
            'expertise_id',
            
        ];
    }

    public function messages()
    {
        return [
            'email.email' => "Email must be in this format example@example",
            'email.unique' => "Email already exist",
        ];
    }
}
