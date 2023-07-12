<?php

namespace App\Models\Buses;

use App\Models\Morph_Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Information_About_Bus extends Model
{
    use HasFactory;

    protected $fillable = [
        'bus_id','bus_type','bus_weight','fuel_capacity','photo'
    ];

    public function bus_information () : HasOne
    {
        return $this->hasOne(
            related: Bus::class,
            foreignKey: 'bus_id'
        );
    }

    public function busPhoto() : MorphMany
    {
        return $this->morphMany(
            related: Morph_Media::class,
            name: 'photoable',
        );
    }

    public function scopeSelection($query)
    {
        return $query->select(
            'bus_id','bus_type','bus_weight','fuel_capacity','photo'
        );
    }
}
