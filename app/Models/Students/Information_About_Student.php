<?php

namespace App\Models\Students;

use App\Models\Morph_Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Information_About_Student extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'student_id','first_name','last_name',
        'father_name','mother_name','birthday',
        'gender','date_of_registration',
        'health_status','notes','photo',
    ];

    public function getGenderAttribute($val) :string
    {
        return $val == 0 ? 'male' : 'female';
    }

    public function student_id() : HasOne
    {
        return $this->hasOne(
            related: Student::class,
            foreignKey: 'student_id');
    }

    public function id_address_student() : HasOne
    {
        return $this->hasOne(
            related: Student_Address::class,
            foreignKey: 'student_id');
    }

    public function studentPhoto() : MorphMany
    {
        return $this->morphMany(
            related: Morph_Media::class,
            name: 'photoable',);
    }

     public function scopeSelection($query)
    {
        return $query->select(
            'id','student_id','name',
            'father_name','mother_name','birthday','gender',
            'date_of_registration','health_status','notes','photo',);
    }


}
