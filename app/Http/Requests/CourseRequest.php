<?php

namespace App\Http\Requests;


class CourseRequest extends ValidatorRequest
{
    public function rules(): array
    {
        return [
            'course_name' => ['required','string','min:2','max:30',],
            'department_id' => ['required','integer','exists:departments,id'],
        ];
    }
}
