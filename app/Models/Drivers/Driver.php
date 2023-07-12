<?php

namespace App\Models\Drivers;

use App\Models\Buses\Bus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_name',
        'bus_id'
    ];

    public function busdriver () : HasOne
    {
        return $this->hasOne(
            related: Bus::class,
            foreignKey: 'bus_id'
        );
    }
    public function information_driver() : HasOne
    {
        return $this->hasOne(
            related: Information_About_Driver::class,
            foreignKey: 'driver_id',
        );
    }

    public function scopeSelection($query)
    {
        return $query->select(
            'id',
            'driver_name',
            'bus_id',
        );
    }

}
