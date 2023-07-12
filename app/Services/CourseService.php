<?php

namespace App\Services;

use App\Http\Requests\CourseRequest;
use App\Models\Course;

class CourseService
{

    public static function get_all_courses($request)
    {


        $per_page = $request->per_page ?? 8 ;
        $course = [];
        $course = Course::all();
        return $course;
    }

    public static function get_one_course($id)
    {
        $course = [];
        $course = Course::where('id',$id)->get();


        return $course;
    }

    public static function create_course(CourseRequest $request)
    {
        $course = Course::create([
            'course_name' => $request->course_name,
            'department_id' => $request->department_id
        ]);

        return $course;
    }

    public static function update_course(CourseRequest $request, $id)
    {
      // Get the Course
        $course = Course::find($id);


        $course->update(
            [
                'course_name' => $request->course_name,
                'department_id' => $request->department_id
            ]);

            // return new course updated 
        return $course;
    }

    public static function delete_course($id)
    {
        $course = Course::find($id);
        $course->delete();
        return 'delete successfuly';
    }
}
