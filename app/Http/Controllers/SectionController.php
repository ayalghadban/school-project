<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionRequest;
use App\Services\SectionService;
use Illuminate\Http\Request;

class SectionController extends ResponseErrorController
{
    public function get_all_sections()
    {
        try
        {
            $data = SectionService::get_all_sections();
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

    public function get_one_section($id)
    {
        try
        {
            $data = SectionService::get_one_section($id);
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

    public function create_section(SectionRequest $request)
    {
        try
        {
            $create = SectionService::create_section($request);

            return $this->sendResponse(__('messages.created_successfully'), $create);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.create_error'), 500);
        }
    }

    public function update_section(SectionRequest $request , $id)
    {
        try{
            $update = SectionService::update_section($request, $id);

            return $this->sendResponse(__('messages.updated_successfully'), $update);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.update_error'), 500);
        }
    }

    public function delete_section($id)
    {
        try{
            $delete = SectionService::delete_section($id);

         return $this->sendResponse(__('messages.deleted_successfully'), $delete);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.delete_error'), 500);
        }
    }
}
