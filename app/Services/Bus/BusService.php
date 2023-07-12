<?php

namespace App\Services\Bus;

use App\Http\Requests\Bus\BusRequest;
use App\Models\Buses\Bus;

class BusService
{

    public static function get_all_buses()
    {
        $bus = [];
        $bus = Bus::all();
        return $bus;
    }

    public static function get_one_bus($id)
    {
        $bus = [];
        $bus = Bus::where('id',$id)->get();
        return $bus;
    }

    public static function create_bus(BusRequest $request)
    {
        $bus = Bus::create([
            'car_name' => $request->car_name,
            'number_of_passengers' => $request->number_of_passengers,
            'starting_point' => $request->starting_point,
            'ending_point' => $request->ending_point,
            'going_driving_time' => $request->going_driving_time,
            'return_driving_time' => $request->return_driving_time
        ]);

        return $bus;
    }

    public static function update_bus(BusRequest $request, $id)
    {
        $bus = Bus::where('id', $id)->update(
            [
                'car_name' => $request->car_name,
                'number_of_passengers' => $request->number_of_passengers,
                'starting_point' => $request->starting_point,
                'ending_point' => $request->ending_point,
                'going_driving_time' => $request->going_driving_time,
                'return_driving_time' => $request->return_driving_time
            ]);
        return $bus;
    }

    public static function delete_bus($id)
    {
        $bus = Bus::find($id);
        $bus->delete();
        return 'delete successfuly';
    }
}
