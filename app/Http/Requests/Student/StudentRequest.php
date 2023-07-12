<?php

namespace App\Http\Requests\Student;

use App\Http\Requests\ValidatorRequest;

class StudentRequest extends ValidatorRequest
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
            'student_name' => ['required', 'string'],
            'section_id' => ['required', 'exists:sections,id']
        ];
    }
}
