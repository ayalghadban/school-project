<?php

namespace App\Http\Requests;


class DepartmentRequest extends ValidatorRequest
{
    
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'department_name' => ['required','string','min:5','max:40'],
        ];
    }

}
