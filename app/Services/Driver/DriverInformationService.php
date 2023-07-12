<?php

namespace App\Services\Driver;

use App\Http\Requests\Driver\DriverInformationRequest;
use App\Models\Drivers\Information_About_Driver;

class DriverInformationService
{
    public static function get_all_drivers_informations()
    {
        $driver = [];
        $driver = Information_About_Driver::all();
        return $driver;
    }

    public static function get_one_driver_information($id)
    {
        $driver = [];
        $driver = Information_About_Driver::where('id',$id)->get();
        return $driver;
    }

    public static function create_driver_information(DriverInformationRequest $request)
    {
        $driver = Information_About_Driver::create([
            'driver_id' =>$request->driver_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'birthday_date' =>$request->birthday_date ,
            'gender' => $request->gender,
            'national_identity_number' => $request->national_identity_number,
            'phone_number' => $request->phone_number,
            'degree' => $request->degree,
            'date_of_the_beginning_of_teaching_in_the_school' =>
                $request->date_of_the_beginning_of_teaching_in_the_school,
            'duration_of_the_employment_contract'
                => $request->duration_of_the_employment_contract,
            'salary' => $request->salary,
            'photo' => $request->photo
        ]);

        return $driver;
    }

    public static function update_driver_information(DriverInformationRequest $request, $id)
    {
        $driver = Information_About_Driver::where('id', $id)->update(
            [
                'driver_id' =>$request->driver_id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'birthday_date' =>$request->birthday_date ,
                'gender' => $request->gender,
                'national_identity_number' => $request->national_identity_number,
                'phone_number' => $request->phone_number,
                'degree' => $request->degree,
                'date_of_the_beginning_of_teaching_in_the_school' =>
                    $request->date_of_the_beginning_of_teaching_in_the_school,
                'duration_of_the_employment_contract'
                    => $request->duration_of_the_employment_contract,
                'salary' => $request->salary,
                'photo' => $request->photo
            ]);
        return $driver;
    }

    public static function delete_driver_information($id)
    {
        $driver = Information_About_Driver::find($id);
        $driver->delete();
        return 'delete successfuly';
    }
}
