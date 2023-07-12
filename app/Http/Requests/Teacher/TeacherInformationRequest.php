<?php

namespace App\Http\Requests\Teacher;

use App\Http\Requests\ValidatorRequest;
use Illuminate\Foundation\Http\FormRequest;

class TeacherInformationRequest extends FormRequest
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
            'teacher_id' => ['required','integer','exists:teachers,id'],
            'first_name' => ['required','string','min:3','exists:teachers,first_name'],
            'last_name' => ['required','string','min:3','exists:teachers,last_name'],
            'father_name' => ['required','string','min:3'],
            'mother_name' => ['required','string','min:3'],
            'birthday_date' => ['required','date'],
            'gender' => ['required', 'boolean'],
            'national_identity_number' => ['required','integer','min:1'],
            'phone_number' => ['required', 'integer','min:10','max:10'],
            'University_degree' => ['required', 'string', ],
            'date_of_the_beginning_of_teaching_in_the_school' => ['required','date'],
            'duration_of_the_employment_contract' => ['required','integer'],
            'salary' => ['required', 'integer'],
            'photo' => ['required','string'],
        ];
    }
}
