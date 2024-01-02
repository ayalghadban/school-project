<?php

namespace App\Http\Requests\Teacher;

use App\Http\Requests\ValidatorRequest;
use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends ValidatorRequest
{

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
