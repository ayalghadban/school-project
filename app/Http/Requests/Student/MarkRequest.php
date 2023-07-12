<?php

namespace App\Http\Requests\Student;

use App\Http\Requests\ValidatorRequest;

class MarkRequest extends ValidatorRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'student_id' => ['required', 'exists:students,id'],
            'subject_id' => ['required', 'exists:subjects,id'],
            'mark' => ['required', 'integer', 'min:0', 'max:600'],
            'result' => ['required', 'boolean'],
            'great_mark' => ['required', 'integer','min:200', 'max:600'],
            'lower_mark' => ['required', 'integer', 'min:80','max:240']
        ];
    }

}
