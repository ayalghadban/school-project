<?php

namespace App\Http\Requests\Driver;

use App\Http\Requests\ValidatorRequest;

class DriverRequest extends ValidatorRequest
{
    
    public function rules(): array
    {
        return [
            'driver_name' => ['required', 'string', 'min:10', 'max:50'],
            'bus_id' => ['required', 'exists:buses,id','integer']
        ];
    }
}
