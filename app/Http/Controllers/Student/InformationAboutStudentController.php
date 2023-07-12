<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseErrorController;
use App\Http\Requests\Student\StudentInformationRequest;
use App\Services\Student\StudentInformationService;

class InformationAboutStudentController extends ResponseErrorController
{
    public function get_all_students_informations()
    {
        try
        {
            $data = StudentInformationService::get_all_students_informations();
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

    public function get_one_student_information($id)
    {
        try
        {
            $data = StudentInformationService::get_one_student_information($id);
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

    public function create_student_information(StudentInformationRequest $request)
    {
        try
        {
            $create = StudentInformationService::create_student_information($request);

            return $this->sendResponse(__('messages.created_successfully'), $create);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.create_error'), 500);
        }
    }

    public function update_student_information(StudentInformationRequest $studentInformationRequest , $id)
    {
        try{
            $update = StudentInformationService::update_student_information($studentInformationRequest, $id);

            return $this->sendResponse(__('messages.updated_successfully'), $update);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.update_error'), 500);
        }
    }

    public function delete_student_information($id)
    {
        try{
            $delete = StudentInformationService::delete_student_information($id);

         return $this->sendResponse(__('messages.deleted_successfully'), $delete);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.delete_error'), 500);
        }
    }
}
