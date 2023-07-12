<?php

namespace App\Services;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;

class DepartmentService
{
    public static function get_all_departments()
    {
        $department = [];
        $department = Department::all();
        return $department;
    }

    public static function get_one_department ($id)
    {
        $department = [];
        $department = Department::where('id',$id)->get();
        return $department;
    }

    public static function create_department(DepartmentRequest $request)
    {
        $department = Department::create([
                'department_name' => $request->department_name,
            ]);
        return $department;
    }

    public static function update_department(DepartmentRequest $request, $id)
    {
        $department= Department::where('id',$id)->update([
            'department_name'=>$request->department_name,
            ]);

        return $department;
    }

    public static function delete_department($id)
    {
        $department = Department::find($id);
        $department->delete();
        return 'delete_successfuly';
    }

}
