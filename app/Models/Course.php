<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_name',
        'department_id',
    ];

    public function department() :BelongsTo
    {
        return $this->belongsTo(
            related: Department::class,
            foreignKey: 'department_id'
        );
    }

    public function section() : HasMany
    {
        return $this->hasMany(
            related: Section::class,
            foreignKey: 'course_id',
        );
    }

    public function subject() : HasMany
    {
        return $this->hasMany(
            related: Subject::class,
            foreignKey: 'course_id'
        );
    }

    public function scopeSelection($query)
    {
        return $query->select('id', 'course_name', 'department_id');
    }

}
