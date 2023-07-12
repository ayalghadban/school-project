<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseErrorController;
use App\Http\Requests\Driver\DriverInformationRequest;
use App\Services\Driver\DriverInformationService;

class InformationAboutDriverController extends ResponseErrorController
{
    public function get_all_drivers_informations()
    {
        try
        {
            $data = DriverInformationService::get_all_drivers_informations();
            if (!$data)
            {
                 return $this->sendError(__('messages.get_data_error'), 400);
            }
            return $this->sendResponse(__('messages.get_data_successfully'), $data);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.get_data_error'), 500);
        }
    }

    public function get_one_driver_information($id)
    {
        try
        {
            $data = DriverInformationService::get_one_driver_information($id);
            if(!$data)
            {
                return $this->sendError(__('messages.get_data_error'), 400);
            }
            return $this->sendResponse(__('messages.get_data_successfully'), $data);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.get_data_error'), 500);
        }
    }

    public function create_driver_information(DriverInformationRequest $request)
    {
        try
        {
            $create = DriverInformationService::create_driver_information($request);

            return $this->sendResponse(__('messages.created_successfully'), $create);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.create_error'), 500);
        }
    }

    public function update_driver_information(DriverInformationRequest $driverInformationRequest , $id)
    {
        try{
            $update = DriverInformationService::update_driver_information($driverInformationRequest, $id);

            return $this->sendResponse(__('messages.updated_successfully'), $update);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.update_error'), 500);
        }
    }

    public function delete_driver_information($id)
    {
        try{
            $delete = DriverInformationService::delete_driver_information($id);

         return $this->sendResponse(__('messages.deleted_successfully'), $delete);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.delete_error'), 500);
        }
    }
}
