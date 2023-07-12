<?php

namespace App\Models\Teachers;

use App\Models\Morph_Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Information_About_Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id','first_name','last_name','father_name',
        'mother_name','birthday_date','gender',
        'national_identity_number','phone_number',
        'University_degree',
        'date_of_the_beginning_of_teaching_in_the_school',
        'duration_of_the_employment_contract','salary',
        'photo'
    ];

    public function getGenderAttribute($val) :string
    {
        return $val == 0 ? 'male' : 'female';
    }

    public function techer_information() : HasOne
    {
        return $this->hasOne(
            related: Teacher::class,
            foreignKey: 'teacher_id',
        );
    }

    public function id_address_teacher() : HasOne
    {
        return $this->hasOne(
            related: Address_Teacher::class,
            foreignKey: 'teacher_id'
        );
    }

    public function teacherPhoto() : MorphMany
    {
        return $this->morphMany(
            related: Morph_Media::class,
            name: 'photoable',
        );
    }

  /*  public function Selection($query)
    {
        return $query->select('teacher_id','first_name','last_name','father_name',
        'mother_name','birthday_date','gender','national_identity_number','phone_number',
        'University_degree','date_of_the_beginning_of_teaching_in_the_school',
        'duration_of_the_employment_contract','salary','photo');
    }*/

}
