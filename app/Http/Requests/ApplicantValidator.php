<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicantValidator extends FormRequest
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
            'full_name',
            'has_answered',
            'title',
            'description',
            'location',
            'resume_pdf',
            'phone',
            'years_of_experience',
            'verified',
            'expertise_id',
            'photo'
        ];
    }

    public function messages()
    {
        return [
            'email.email' => "Email must be in this format example@example",
//            'email.unique' => "Email already exist",
        ];
    }
}
