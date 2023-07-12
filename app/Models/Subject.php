<?php

namespace App\Models;

use App\Models\Students\Mark;
use App\Models\Students\Student;
use App\Models\Teachers\Teacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_name',
        'course_id',
        'great_mark',
        'lower_mark',
        'number_lessons_of_this_subject_in_the_week'
    ];

    public function subjectclass() : BelongsTo
    {
        return $this->belongsTo(
            related: Course::class,
            foreignKey: 'course_id'
        );
    }

    public function teacher_subject() : HasOne
    {
        return $this->hasOne(
            related: Teacher::class,
        );
    }

    public function marks() :HasOne
    {
        return $this->hasOne(
            related: Mark::class,
            foreignKey: 'subject_id'
        );
    }

    public function subjectsStudent() :BelongsToMany
    {
        return $this->belongsToMany(
            related: Student::class,
            table: 'student__subjects',
            foreignPivotKey: 'subject_id',
            relatedPivotKey: 'student_id',
            parentKey: 'id',
            relatedKey: 'id'
        );
    }

    //public function scopeSelection($query)
    //{
        //return $query->select(
        //'id',
        //'subject_name',
        //'course_id',
        //'great_mark',
        //'lower_mark',
        //'number_lessons_of_this_subject_in_the_week');
    //}
}
