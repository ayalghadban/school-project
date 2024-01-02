<?php

namespace App\Http\Requests;


class SectionRequest extends ValidatorRequest
{

    public function rules(): array
    {
        return [
            'section_name' => ['required','string','min:5','max:40'],
            'course_id' => ['required','integer','exists:courses,id'],
        ];
    }
}
