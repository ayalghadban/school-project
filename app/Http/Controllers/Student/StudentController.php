<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseErrorController;
use App\Http\Requests\Student\StudentRequest;
use App\Services\Student\StudentService;

class StudentController extends ResponseErrorController
{
    public function get_all_students()
    {
        try
        {
            $data = StudentService::get_all_students();
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

    public function get_one_student(int $id)
    {
        try
        {
            $data = StudentService::get_one_student($id);
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

    public function get_students_for_one_section(int $section_id)
    {
        try
        {
            $data = StudentService::get_students_for_one_section($section_id);
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

    public function create_student(StudentRequest $request)
    {
        try
        {
            $create = StudentService::create_student($request);

            return $this->sendResponse(__('messages.created_successfully'), $create);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.create_error'), 500);
        }
    }

    public function update_student(StudentRequest $studentRequest ,int $id)
    {
        try{
            $update = StudentService::update_student($studentRequest, $id);

            return $this->sendResponse(__('messages.updated_successfully'), $update);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.update_error'), 500);
        }
    }

    public function delete_student(int $id)
    {
        try{
            $delete = StudentService::delete_student($id);

         return $this->sendResponse(__('messages.deleted_successfully'), $delete);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.delete_error'), 500);
        }
    }
}
