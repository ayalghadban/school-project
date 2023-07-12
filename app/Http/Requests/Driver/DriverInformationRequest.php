<?php

namespace App\Http\Requests\Driver;

use App\Http\Requests\ValidatorRequest;

class DriverInformationRequest extends ValidatorRequest
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
            'driver_id' => ['required', 'exists:drivers,id'],
            'first_name'=> ['required', 'string', 'min:3'],
            'last_name' => ['required', 'string', 'min:3'],
            'father_name' => ['required', 'string', 'min:3'],
            'mother_name' => ['required', 'string', 'min:3'],
            'birthday_date' =>['required', 'date'],
            'gender' => ['required', 'boolean'],
            'national_identity_number' => ['required','integer'],
            'phone_number' => ['required'],
            'degree' => ['required', 'string'],
            'date_of_the_beginning_of_teaching_in_the_school' => ['required', 'date'],
            'duration_of_the_employment_contract' => ['required',],
            'salary','photo'
        ];
    }
}
