<?php

namespace App\Models\Students;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Mark extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'mark_id'
    ];
}
