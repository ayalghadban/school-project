<?php

namespace App\Models\Students;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Mark extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id','subject_id',
        'mark','result',
        'great_mark','lower_mark'
    ];

    public function get_result($val) :string
    {
        return $val == 0 ? 'failed' : 'success';
    }

    public function subjectsMarks() :HasOne
    {
        return $this->hasOne(
            related: Subject::class,
            foreignKey: 'subject_id'
        );
    }

    public function studentmarks() :BelongsToMany
    {
        return $this->belongsToMany(
            related: Student::class,
            table: 'student__marks',
            foreignPivotKey: 'mark_id',
            relatedPivotKey: 'student_id',
            parentKey: 'id',
            relatedKey: 'id'
        );
    }
    public function scopeSelection($query)
    {
        return $query->select('student_id','subject_id','mark','result');
    }
}
