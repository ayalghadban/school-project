<?php

namespace App\Http\Requests\Student;

use App\Http\Requests\ValidatorRequest;

class StudentInformationRequest extends ValidatorRequest
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
            'student_id' => ['required', 'exists:students,id',],
            'name' => ['required', 'exists:students,student_name', 'string'],
            'father_name' => ['required', 'string'],
            'mother_name' => ['required','string'],
            'birthday' => ['required', 'date'],
            'gender' => ['required', 'boolean'],
            'date_of_registration' => ['required', 'date'],
            'health_status' => ['required', 'string'],
            'notes' => ['required','string'],
            'photo' => ['required', 'string'],
        ];
    }
}

