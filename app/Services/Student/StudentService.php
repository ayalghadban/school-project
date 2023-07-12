<?php

namespace App\Services\Student;

use App\Http\Requests\Student\StudentRequest;
use App\Models\Students\Student;

class StudentService
{

    public static function get_all_students()
    {
        $student = [];
        $student = Student::all();
        return $student;
    }

    public static function get_one_student(int $id)
    {
        $student = [];
        $student = Student::where('id',$id)->get();
        return $student;
    }

    public static function get_students_for_one_section(int $section_id)
    {
        $students = [];
        $students = Student::where('section_id',$section_id)->Selection()->get();
        return $students;
    }

    public static function create_student(StudentRequest $request)
    {
        $student = Student::create([
            'student_name' => $request->student_name,
            'section_id' => $request->section_id
        ]);

        return $student;
    }

    public static function update_student(StudentRequest $request,int $id)
    {
        $student = Student::where('id', $id)->update(
            [
                'student_name' => $request->student_name,
                'section_id' => $request->section_id
            ]);
        return $student;
    }

    public static function delete_student(int $id)
    {
        $student = Student::find($id);
        $student->delete();
        return 'delete successfuly';
    }
}
