<?php

namespace App\Services;

use App\Http\Requests\SubjectRequest;
use App\Models\Subject;

class SubjectService
{
    public static function get_all_subjects()
    {
        $subject = [];
        $subject = Subject::all();

        return $subject;
    }

    public static function get_one_subject($id)
    {
        $subject = [];
        $subject = Subject::where('id',$id)->get();

        return $subject;
    }

    public static function create_subject(SubjectRequest $request)
    {
        $subject = Subject::create([
            'subject_name' => $request->subject_name,
            'course_id' => $request->course_id,
            'great_mark' => $request->great_mark,
            'lower_mark' => $request->lower_mark,
            'number_lessons_of_this_subject_in_the_week' => $request->number_lessons_of_this_subject_in_the_week,
        ]);

        return $subject;
    }

    public static function update_subject(SubjectRequest $request, $id)
    {

        $subject = Subject::where('id', $id)->update(
            [
                'subject_name' => $request->subject_name,
                'course_id'=> $request->course_id,
                'great_mark'=> $request->great_mark,
                'lower_mark'=> $request->lower_mark,
                'number_lessons_of_this_subject_in_the_week'=> $request->number_lessons_of_this_subject_in_the_week
            ]);

        return $subject;
    }

    public static function delete_subject($id)
    {
        $subject = Subject::find($id);
        $subject->delete();

        return 'delete successfuly';
    }
}
