<?php

namespace App\Http\Requests;


class CourseRequest extends ValidatorRequest
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
            'cousre_name' => ['required','string','min:2','max:30',],
            'department_id' => ['required','integer','exists:departments,id'],
        ];
    }
}
