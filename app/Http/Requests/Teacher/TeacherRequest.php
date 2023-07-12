<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
    public function rules()
    {
        return [
            'first_name' => ['required', 'string','min:3'],
            'last_name' => ['required', 'string','min:3'],
            'subject_id' => ['required', 'integer', 'exists:subjects,id',],
            'number_of_lessons_in_the_week' => ['required', 'integer','min:1'],

        ];
    }
}
