<?php

namespace App\Http\Requests\Student;

use App\Http\Requests\ValidatorRequest;

class StudentRequest extends ValidatorRequest
{
   
    public function rules(): array
    {
        return [
            'student_name' => ['required', 'string'],
            'section_id' => ['required', 'exists:sections,id']
        ];
    }
}
