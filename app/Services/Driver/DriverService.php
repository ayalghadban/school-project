<?php

namespace App\Services\Driver;

use App\Http\Requests\Driver\DriverRequest;
use App\Models\Drivers\Driver;

class DriverService
{
    public static function get_all_drivers()
    {
        $driver = [];
        $driver = Driver::all();
        return $driver;
    }

    public static function get_one_driver($id)
    {
        $driver = [];
        $driver = Driver::where('id',$id)->get();
        return $driver;
    }

    public static function create_driver(DriverRequest $request)
    {
        $driver = Driver::create([
            'driver_name' => $request->driver_name,
            'bus_id' => $request->bus_id
        ]);

        return $driver;
    }

    public static function update_driver(DriverRequest $request, $id)
    {
        $driver = Driver::where('id', $id)->update(
            [
                'driver_name' => $request->driver_name,
                'bus_id' => $request->bus_id
            ]);
        return $driver;
    }

    public static function delete_driver($id)
    {
        $driver = Driver::find($id);
        $driver->delete();
        return 'delete successfuly';
    }
}
