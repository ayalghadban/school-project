<?php

namespace App\Http\Requests\Driver;

use App\Http\Requests\ValidatorRequest;

class DriverRequest extends ValidatorRequest
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
            'driver_name' => ['required', 'string', 'min:10', 'max:50'],
            'bus_id' => ['required', 'exists:buses,id','integer']
        ];
    }
}
