<?php

namespace App;

use App\Schedule;
use App\FlightDay;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Flight extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'carrier',
        'departure_point',
        'arrival_point',
        'type',
    ];

    /**
     * A flight has many flight days.
     *
     * @return  Illuminate\Database\Eloquent\hasMany
     */   
    public function flightDays()
    {
        return $this->hasMany(FlightDay::class);
    }

    /**
     * A flight has many scheduled flights.
     *
     * @return  Illuminate\Database\Eloquent\hasMany
     */   
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    /**
     * Format the code attribute on set.
     *
     * @return  string
     */   
    public function setCodeAttribute($value)
    {
        return $this->attributes['code'] = strtoupper($value);
    }

    /**
     * Format the code attribute on get.
     *
     * @return  string
     */   
    public function getCodeAttribute($value)
    {
        return strtoupper($value);
    }

    /**
     * Format the code attribute on get.
     *
     * @return  string
     */   
    public function getTypeAttribute($value)
    {
        return ucfirst($value);
    }
}