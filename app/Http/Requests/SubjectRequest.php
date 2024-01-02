<?php

namespace App\Http\Requests;


class SubjectRequest extends ValidatorRequest
{

    public function rules(): array
    {
        return [
            'subject_name' => ['required', 'string', 'min:1', 'max:40'],
            'course_id' => ['required', 'integer','min:1','exists:courses,id'],
            'great_mark' => ['required', 'integer', 'min:100','max:600'],
            'lower_mark' => ['required', 'integer', 'min:40', 'max:240'],
            'number_lessons_of_this_subject_in_the_week' => ['required', 'integer', 'min:2', 'max:14'],
        ];
    }
}
