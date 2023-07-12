<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseErrorController;
use App\Http\Requests\Teacher\TeacherInformationRequest;
use App\Services\Teacher\TeacherInformationService;
use Illuminate\Http\Request;

class InformationAboutTeacherController extends ResponseErrorController
{
    public function get_all_teachers_informations()
    {
        try
        {
            $data = TeacherInformationService::get_all_teachers_informations();
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

    public function get_one_teacher_information(int $id)
    {
        try
        {
            $data = TeacherInformationService::get_one_teacher_information($id);
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

    public function create_teacher_information(TeacherInformationRequest $request)
    {
        try
        {
            $create = TeacherInformationService::create_teacher_information($request);

            return $this->sendResponse(__('messages.created_successfully'), $create);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.create_error'), 500);
        }
    }

    public function update_teacher_information(TeacherInformationRequest $request ,int $id)
    {
        try{
            $update = TeacherInformationService::update_teacher_information($request, $id);

            return $this->sendResponse(__('messages.updated_successfully'), $update);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.update_error'), 500);
        }
    }

    public function delete_teacher_information(int $id)
    {
        try{
            $delete = TeacherInformationService::delete_teacher_information($id);

         return $this->sendResponse(__('messages.deleted_successfully'), $delete);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.delete_error'), 500);
        }
    }
}
