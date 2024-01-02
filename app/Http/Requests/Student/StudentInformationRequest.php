<?php

namespace App\Http\Requests\Student;

use App\Http\Requests\ValidatorRequest;

class StudentInformationRequest extends ValidatorRequest
{

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

