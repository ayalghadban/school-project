<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_name',
        'course_id',
    ];

    public function section_course() : BelongsTo
    {
        return $this->belongsTo(
            related: Course::class,
            foreignKey: 'course_id'
        );
    }
    public function section_student() : HasMany
    {
        return $this->hasMany(
            related: Student::class,
            foreignKey: 'section_id',
        );
    }

    public function scopeSelection($query)
    {
        return $query->select('id', 'section_name', 'course_id');
    }

}
