<?php

namespace App\Models\Buses;

use App\Models\Drivers\Driver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_name','number_of_passengers',
        'starting_point','ending_point',
        'going_driving_time','return_driving_time'
    ];

    public function driverbus () : HasOne
    {
        return $this->hasOne(
            related: Driver::class,
            foreignKey: 'bus_id'
        );
    }

    public function information_bus () : HasOne
    {
        return $this->hasOne(
            related: Information_About_Bus::class,
            foreignKey: 'bus_id'
        );
    }

    public function scopeSelection($query)
    {
        return $query->select(
            'car_name','number_of_passengers',
            'starting_point','ending_point',
            'going_driving_time','return_driving_time'
        );
    }
}
