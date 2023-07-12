<?php

namespace App\Services\Teacher;

use App\Http\Requests\Teacher\TeacherRequest;
use App\Models\Teachers\Teacher;

class TeacherService
{
    public static function get_all_teachers()
    {
        $teacher = [];
        $teacher = Teacher::all();
        return $teacher;
    }

    public static function get_one_teacher($id)
    {
        $teacher = [];
        $teacher = Teacher::where('id',$id)->get();
        return $teacher;
    }

    public static function create_teacher(TeacherRequest $request)
    {
        $teacher = Teacher::create([
            'name' => $request->name,
            'subject_id' => $request->subject_id,
            'number_of_lessons_in_the_week' => $request->number_of_lessons_in_the_week,
        ]);

        return $teacher;
    }

    public static function update_teacher(TeacherRequest $request,int $id)
    {
        $teacher = Teacher::where('id', $id)->update(
            [
                'name' => $request->name,
                'subject_id' => $request->subject_id,
                'number_of_lessons_in_the_week' => $request->number_of_lessons_in_the_week,
            ]);
        return $teacher;
    }

    public static function delete_teacher(int $id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();
        return 'delete successfuly';
    }
}
