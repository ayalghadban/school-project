<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectRequest;
use App\Services\SubjectService;
use Illuminate\Http\Request;

class SubjectController extends ResponseErrorController
{
    public function get_all_subjects()
    {
        try
        {
            $data = SubjectService::get_all_subjects();
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

    public function get_one_subject(int $id)
    {
        try
        {
            $data = SubjectService::get_one_subject($id);
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

    public function create_subject(SubjectRequest $request)
    {
        try
        {
            $create = SubjectService::create_subject($request);

            return $this->sendResponse(__('messages.created_successfully'), $create);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.create_error'), 500);
        }
    }

    public function update_subject(SubjectRequest $request , $id)
    {
        try{
            $update = SubjectService::update_subject($request, $id);

            return $this->sendResponse(__('messages.updated_successfully'), $update);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.update_error'), 500);
        }
    }

    public function delete_subject($id)
    {
        try{
            $delete = SubjectService::delete_subject($id);

         return $this->sendResponse(__('messages.deleted_successfully'), $delete);
        }
        catch(\Exception $ex)
        {
            return $this->sendError(__('messages.delete_error'), 500);
        }
    }
}
