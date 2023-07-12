<?php

namespace App\Models\Drivers;

use App\Models\Morph_Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Information_About_Driver extends Model
{
    use HasFactory;
    protected $fillable = [
        'driver_id','first_name','last_name',
        'father_name','mother_name','birthday_date',
        'gender','national_identity_number',
        'phone_number','degree',
        'date_of_the_beginning_of_teaching_in_the_school',
        'duration_of_the_employment_contract','salary','photo'
    ];

    public function getGenderAttribute($val)
    {
        return $val == 0 ? 'male' : 'female';
    }

    public function driver_information() : HasOne
    {
        return $this->hasOne(
            related: Driver::class,
            foreignKey: 'driver_id',
        );
    }

    public function driverPhoto() : MorphMany
    {
        return $this->morphMany(
            related: Morph_Media::class,
            name: 'photoable',
        );
    }

    public function scopeSelection($query)
    {
        return $query->select(
            'driver_id','first_name','last_name',
            'father_name','mother_name','birthday_date',
            'gender','national_identity_number',
            'phone_number','degree',
            'date_of_the_beginning_of_teaching_in_the_school',
            'duration_of_the_employment_contract','salary','photo'
        );
    }
}
