<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\ResponseErrorController;
use App\Http\Requests\Student\MarkRequest;
use App\Services\Student\MarkService;

class MarkController extends ResponseErrorController
{
    public function get_all_marks()
    {
        try
        {
            $data = MarkService::get_all_marks();
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

    public function get_one_mark(int $id)
    {
        try
        {
            $data = MarkService::get_one_mark($id);
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

    public function get_marks_for_one_student(int $student_id)
    {
        try
        {
            $data = MarkService::get_marks_for_one_student($student_id);
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

    public function get_marks_for_one_subject(int $subject_id)
    {
        try
        {
            $data = MarkService::get_marks_for_one_subject($subject_id);
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

    public function create_mark(MarkRequest $request)
    {
        try
        {
            $create = MarkService::create_mark($request);

            return $this->sendResponse(__('messages.created_successfully'), $create);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.create_error'), 500);
        }
    }

    public function update_mark(MarkRequest $markRequest ,int $id)
    {
        try{
            $update = MarkService::update_mark($markRequest, $id);

            return $this->sendResponse(__('messages.updated_successfully'), $update);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.update_error'), 500);
        }
    }

    public function delete_mark(int $id)
    {
        try{
            $delete = MarkService::delete_mark($id);

         return $this->sendResponse(__('messages.deleted_successfully'), $delete);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.delete_error'), 500);
        }
    }
}
