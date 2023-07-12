<?php

namespace App\Services;

use App\Http\Requests\SectionRequest;
use App\Models\Section;

class SectionService
{
    public static function get_all_sections()
    {
        $section = [];
        $section = Section::all();
        return $section;
    }

    public static function get_one_section($id)
    {
        $section = [];
        $section = Section::where('id',$id)->get();
        return $section;
    }

    public static function create_section(SectionRequest $request)
    {
        $section = Section::create([
            'section_name' => $request->section_name,
            'course_id' => $request->course_id
        ]);

        return $section;
    }

    public static function update_section(SectionRequest $request, $id)
    {
        $section = Section::where('id', $id)->update(
            [
                'section_name' => $request->section_name,
                'course_id' => $request->course_id
            ]);
        return $section;
    }

    public static function delete_section($id)
    {
        $section = Section::find($id);
        $section->delete();
        return 'delete successfuly';
    }
}
