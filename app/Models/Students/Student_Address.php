<?php

namespace App\Models\Students;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student_Address extends Model
{
    use HasFactory;

    protected $fiilable = [
        'student_id','student_address',
        'lat','long',
    ];

    public function id_student_address() : HasOne
    {
        return $this->hasOne(
            related: Information_About_Student::class,
            foreignKey: 'student_id'
        );
    }

    public function Selection($query)
    {
        return $query->select('student_id','student_address','lat','long',);
    }
}
