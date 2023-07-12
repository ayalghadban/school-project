<?php

namespace App\Http\Controllers\Bus;

use App\Http\Controllers\ResponseErrorController;
use App\Http\Requests\Bus\BusInformationRequest;
use App\Services\Bus\InformationAboutBusService;

class InformationAboutBusController extends ResponseErrorController
{
    public function get_all_buses_informations()  
    {
        try
        {
            $data = InformationAboutBusService::get_all_buses_informations();
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

    public function get_one_bus_information(int $id)
    {
        try
        {
            $data = InformationAboutBusService::get_one_bus_information($id);
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

    public function create_bus_information(BusInformationRequest $request)
    {
        try
        {
            $create = InformationAboutBusService::create_bus_information($request);
            return $this->sendResponse(__('messages.created_successfully'), $create);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.create_error'), 500);
        }
    }

    public function update_bus_information(BusInformationRequest $request ,int $id)
    {
        try{
            $update = InformationAboutBusService::update_bus_information($request, $id);

            return $this->sendResponse(__('messages.updated_successfully'), $update);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.update_error'), 500);
        }
    }

    public function delete_bus_information(int $id)
    {
        try{
            $delete = InformationAboutBusService::delete_bus_information($id);

         return $this->sendResponse(__('messages.deleted_successfully'), $delete);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.delete_error'), 500);
        }
    }
}
