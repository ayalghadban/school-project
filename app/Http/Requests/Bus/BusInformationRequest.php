<?php

namespace App\Http\Requests\Bus;

use App\Http\Requests\ValidatorRequest;

class BusInformationRequest extends ValidatorRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'bus_id' => ['required', 'exists:buses,id', 'min:1'],
            'bus_type' => ['required', 'string', 'min:15','max:50'],
            'bus_weight' => ['required', 'integer', 'min:5000'],
            'fuel_capacity' => ['required', 'integer', 'min:50'],
            'photo' => ['required', 'string'],
        ];
    }


}
