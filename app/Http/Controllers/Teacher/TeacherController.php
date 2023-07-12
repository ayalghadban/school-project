<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\ResponseErrorController;
use App\Http\Requests\Teacher\TeacherRequest;
use App\Services\Teacher\TeacherService;

class TeacherController extends ResponseErrorController
{
    public function get_all_teachers()
    {
        try
        {
            $data = TeacherService::get_all_teachers();
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

    public function get_one_teacher($id)
    {
        try
        {
            $data = TeacherService::get_one_teacher($id);
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

    public function create_teacher(TeacherRequest $request)
    {
        try
        {
            $create = TeacherService::create_teacher($request);

            return $this->sendResponse(__('messages.created_successfully'), $create);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.create_error'), 500);
        }
    }

    public function update_teacher(TeacherRequest $request ,int $id)
    {
        try{
            $update = TeacherService::update_teacher($request, $id);

            return $this->sendResponse(__('messages.updated_successfully'), $update);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.update_error'), 500);
        }
    }

    public function delete_teacher(int $id)
    {
        try{
            $delete = TeacherService::delete_teacher($id);

         return $this->sendResponse(__('messages.deleted_successfully'), $delete);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.delete_error'), 500);
        }
    }
}
