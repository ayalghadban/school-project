<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Morph_Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'photoable',
        'media_path',
        'media_name',
        'media_type'
    ];

    public function photoable() :MorphTo
    {
        return $this->morphTo();
    }
}
