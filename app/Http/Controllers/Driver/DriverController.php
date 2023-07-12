<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\ResponseErrorController;
use App\Http\Requests\Driver\DriverRequest;
use App\Services\Driver\DriverService;

class DriverController extends ResponseErrorController
{
    public function get_all_drivers()
    {
        try
        {
            $data = DriverService::get_all_drivers();
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

    public function get_one_driver($id)
    {
        try
        {
            $data =DriverService::get_one_driver($id);
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

    public function create_driver(DriverRequest $request)
    {
        try
        {
            $create = DriverService::create_driver($request);

            return $this->sendResponse(__('messages.created_successfully'), $create);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.create_error'), 500);
        }
    }

    public function update_driver(DriverRequest $driverRequest , $id)
    {
        try{
            $update = DriverService::update_driver($driverRequest, $id);

            return $this->sendResponse(__('messages.updated_successfully'), $update);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.update_error'), 500);
        }
    }

    public function delete_driver($id)
    {
        try{
            $delete = DriverService::delete_driver($id);

         return $this->sendResponse(__('messages.deleted_successfully'), $delete);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.delete_error'), 500);
        }
    }
}
