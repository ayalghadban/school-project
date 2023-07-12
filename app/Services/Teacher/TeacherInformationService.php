<?php

namespace App\Services\Teacher;

use App\Http\Requests\Teacher\TeacherInformationRequest;
use App\Models\Teachers\Information_About_Teacher;

class TeacherInformationService
{
    public static function get_all_teachers_informations()
    {
        $teacher = [];
        $teacher = Information_About_Teacher::all();
        return $teacher;
    }

    public static function get_one_teacher_information(int $id)
    {
        $teacher = [];
        $teacher = Information_About_Teacher::where('id',$id)->get();
        return $teacher;
    }

    public static function create_teacher_information(TeacherInformationRequest $request)
    {
        $teacher = Information_About_Teacher::create([
            'teacher_id' => $request->teacher_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'father_name' => $request->father_id,
            'mother_name' => $request->mother_name,
            'birthday_date' => $request->birthday_date,
            'gender' => $request->gender,
            'national_identity_number' => $request->national_identity_number,
            'phone_number' => $request->phone_number,
            'University_degree' => $request->University_degree,
            'date_of_the_beginning_of_teaching_in_the_school'
                 => $request->date_of_the_beginning_of_teaching_in_the_school,
            'duration_of_the_employment_contract'
                => $request->duration_of_the_employment_contract,
            'salary' => $request->salary,
            'photo' =>$request->photo
        ]);

        return $teacher;
    }

    public static function update_teacher_information(TeacherInformationRequest $request,int $id)
    {
        $teacher = Information_About_Teacher::where('id', $id)->update([
            'teacher_id' => $request->teacher_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'father_name' => $request->father_id,
            'mother_name' => $request->mother_name,
            'birthday_date' => $request->birthday_date,
            'gender' => $request->gender,
            'national_identity_number' => $request->national_identity_number,
            'phone_number' => $request->phone_number,
            'University_degree' => $request->University_degree,
            'date_of_the_beginning_of_teaching_in_the_school'
                 => $request->date_of_the_beginning_of_teaching_in_the_school,
            'duration_of_the_employment_contract'
                => $request->duration_of_the_employment_contract,
            'salary' => $request->salary,
            'photo' =>$request->photo
        ]);
        return $teacher;
    }

    public static function delete_teacher_information(int $id)
    {
        $teacher = Information_About_Teacher::find($id);
        $teacher->delete();
        return 'delete successfuly';
    }
}
