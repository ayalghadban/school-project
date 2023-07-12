<?php

namespace App\Models\Teachers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Address_Teacher extends Model
{
    use HasFactory;

    protected $fiilable = [
        'teacher_id',
        'teacher_address',
        'lat',
        'long',
    ];

    public function id_teacher_address() : HasOne
    {
        return $this->hasOne(
            related: Information_About_Teacher::class,
            foreignKey: 'teacher_id'
        );
    }

    public function Selection($query)
    {
        return $query->select('teacher_id','teacher_address','lat','long',);
    }
}
