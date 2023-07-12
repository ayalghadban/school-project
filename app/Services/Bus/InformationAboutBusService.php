<?php

namespace App\Services\Bus;

use App\Http\Requests\Bus\BusInformationRequest;
use App\Models\Buses\Information_About_Bus;

class InformationAboutBusService
{

    public static function get_all_buses_informations()
    {
        $bus = [];
        $bus = Information_About_Bus::all();
        return $bus;
    }

    public static function get_one_bus_information($id)
    {
        $bus = [];
        $bus = Information_About_Bus::where('id',$id)->get();
        return $bus;
    }

    public static function create_bus_information(BusInformationRequest $request)
    {
        $bus = Information_About_Bus::create([
            'bus_id' => $request->bus_id,
            'bus_type' => $request->bus_type,
            'bus_weight' => $request->bus_weight,
            'fuel_capacity'=>$request->fuel_capacity,
            'photo' => $request->photo
        ]);

        return $bus;
    }

    public static function update_bus_information(BusInformationRequest $request, $id)
    {
        $bus = Information_About_Bus::where('id', $id)->update(
            [
                'bus_id' => $request->bus_id,
                'bus_type' => $request->bus_type,
                'bus_weight' => $request->bus_weight,
                'fuel_capacity'=>$request->fuel_capacity,
                'photo' => $request->photo
            ]);
        return $bus;
    }

    public static function delete_bus_information($id)
    {
        $bus = Information_About_Bus::find($id);
        $bus->delete();
        return 'delete successfuly';
    }
}
