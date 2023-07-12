<?php

namespace App\Models\Students;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name',
        'section_id',
    ];

    public function student_section() : BelongsTo
    {
        return $this->belongsTo(
            related: Section::class,
            foreignKey: 'section_id',
        );
    }

    public function id_student() : HasOne
    {
        return $this->hasOne(
            related: Information_About_Student::class,
            foreignKey: 'student_id'
        );
    }

    public function marks() :BelongsToMany
    {
        return $this->belongsToMany(
            related: Mark::class,
            table: 'student__marks',
            foreignPivotKey: 'student_id',
            relatedPivotKey: 'mark_id',
            parentKey: 'id',
            relatedKey: 'id'
        );
    }

    public function subjectsStudent() :BelongsToMany
    {
        return $this->belongsToMany(
            related: Subject::class,
            table: 'student__subjects',
            foreignPivotKey: 'student_id',
            relatedPivotKey: 'subject_id',
            parentKey: 'id',
            relatedKey: 'id'
        );
    }

    public function scopeSelection($query)
    {
        return $query->select('student_name','section_id');
    }

}
