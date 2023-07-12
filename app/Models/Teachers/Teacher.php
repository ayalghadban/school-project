<?php

namespace App\Models\Teachers;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'subject_id',
        'number_of_lessons_in_the_week',
    ];

    public function subject_teacher () : HasOne
    {
        return $this->hasOne(
            related: Subject::class,
            foreignKey: 'subject_id'
        );
    }

    public function information_techer() : HasOne
    {
        return $this->hasOne(
            related: Information_About_Teacher::class,
            foreignKey: 'teacher_id',
        );
    }

    public function Selection($query)
    {
        return $query->select('name','subject_id','number_of_lessons_in_the_week',);
    }

}
