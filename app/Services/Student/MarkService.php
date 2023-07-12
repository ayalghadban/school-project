<?php

namespace App\Services\Student;

use App\Http\Requests\Student\MarkRequest;
use App\Models\Students\Mark;
use App\Models\Students\Student;

class MarkService
{

    public static function get_all_marks()
    {
        $mark = [];
        $mark = Mark::all();
        return $mark;
    }

    public static function get_one_mark(int $id)
    {
        $mark = [];
        $mark = Mark::where('id', $id)->get();

        return $mark;
    }

    public static function get_marks_for_one_student(int $student_id)
    {
        $marks = [];

     

        $marks = Mark::where('student_id', $student_id)->Selection()->get();

        return $marks;
    }

    public static function get_marks_for_one_subject(int $subject_id)
    {
        $marks = [];
        $marks = Mark::where('subject_id', $subject_id)->Selection()->get();

        return $marks;
    }

    public static function create_mark(MarkRequest $request)
    {
        $mark = Mark::create([
            'student_id' => $request->student_id,
            'subject_id' => $request->subject_id,
            'mark' => $request->mark,
            'result' => $request->result,
            'great_mark' => $request->great_mark,
            'lower_mark' =>  $request->lower_mark
        ]);

        return $mark;
    }

    public static function update_mark(MarkRequest $request,int $id)
    {
        $mark = Mark::where('id', $id)->update(
            [
                'student_id' => $request->student_id,
                'subject_id' => $request->subject_id,
                'mark' => $request->mark,
                'result' => $request->result,
                'great_mark' => $request->great_mark,
                'lower_mark' =>  $request->lower_mark
            ]);

        return $mark;
    }

    public static function delete_mark(int $id)
    {
        $mark = Mark::find($id);
        $mark->delete();

        return 'delete successfuly';
    }
}
