<?php

namespace App\Services\Student;

use App\Http\Requests\Student\StudentInformationRequest;
use App\Models\Students\Information_About_Student;

class StudentInformationService
{

    public static function get_all_students_informations()
    {
        $student = [];
        $student = Information_About_Student::all();

        return $student;
    }

    public static function get_one_student_information($id)
    {
        $student = [];
        $student = Information_About_Student::where('id', $id)->get();

        return $student;
    }

    public static function create_student_information(StudentInformationRequest $request)
    {
        $student = Information_About_Student::create([
            'student_id'=> $request->student_id,
            'name' => $request->name,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'date_of_registration' => $request->date_of_registration,
            'health_status' => $request->health_status,
            'notes' => $request->notes,
            'photo' => $request->photo,
        ]);

        return $student;
    }

    public static function update_student_information(StudentInformationRequest $request, $id)
    {
        $student = Information_About_Student::where('id', $id)->update(
            [
                'student_id'=> $request->student_id,
                'name' => $request->name,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'birthday' => $request->birthday,
                'gender' => $request->gender,
                'date_of_registration' => $request->date_of_registration,
                'health_status' => $request->health_status,
                'notes' => $request->notes,
                'photo' => $request->photo,
            ]);

        return $student;
    }

    public static function delete_student_information($id)
    {
        $student = Information_About_Student::find($id);
        $student->delete();

        return 'delete successfuly';
    }
}
