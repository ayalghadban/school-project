<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_name'
    ];

    public function course() : HasMany
    {
        return $this->hasMany(
            related: Course::class,
            foreignKey: 'department_id',
        );
    }

    public function scopeSelection($query)
    {
        return $query->select('id', 'department_name');
    }

}
