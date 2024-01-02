<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Services\CourseService;
use Illuminate\Http\Request;

class CourseController extends ResponseErrorController
{
    public function get_all_courses()
    {
        try
        {
            $data = CourseService::get_all_courses();
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

    public function get_one_course($id)
    {
        try
        {
            $data = CourseService::get_one_course($id);
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

    public function create_course(CourseRequest $request)
    {
        try
        {
            $create = CourseService::create_course($request);

            return $this->sendResponse(__('messages.created_successfully'), $create);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.create_error'), 500);
            //return $ex;
        }
    }

    public function update_course(CourseRequest $request , $id)
    {
        try{
            $update = CourseService::update_course($request, $id);

            return $this->sendResponse(__('messages.updated_successfully'), $update);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.update_error'), 500);
        }
    }

    public function delete_course($id)
    {
        try{
            $delete = CourseService::delete_course($id);

         return $this->sendResponse(__('messages.deleted_successfully'), $delete);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.delete_error'), 500);
        }
    }
}
