<?php

namespace App\Http\Requests\Bus;

use App\Http\Requests\ValidatorRequest;

class BusRequest extends ValidatorRequest
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
            'car_name' => ['required', 'string', 'min:10', 'max:50'],
            'number_of_passengers' => ['required', 'integer', 'min:15', 'max:50'],
            'starting_point' => ['required', 'string', 'min:5', 'max:50'],
            'ending_point' => ['required', 'string', 'min:5', 'max:50'],
            'going_driving_time' => ['required','integer'],
            'return_driving_time' => ['required','integer'],
        ];
    }


}
