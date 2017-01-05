<?php

namespace App;

use App\Flight;
use App\Controller;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lane',
        'status',
    ];
    
    /**
     * The attributes that are instantiated as Carbon datetime objects.
     *
     * @var array
     */   
    protected $dates = [
        'flight_datetime',
        'created_at',
        'updated_at'
    ];
    
    /**
     * A schedule belongs to a flight.
     *
     * @return Illuminate\Database\Eloquent\belongsTo
     */   
    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }

    /**
     * A scheduled flight belongs to many controllers.
     *
     * @return Illuminate\Database\Eloquent\belongsToMany
     */   
    public function controllers()
    {
        return $this->belongsToMany(Controller::class)->withTimestamps();
    }

    /**
     * Format date attribute on get.
     *
     * @return string
     */   
    public function getFlightDatetimeAttribute($value)
    {
        return date("Y-m-d H:i", strtotime($value));
    }

    /**
     * Format date attribute on set.
     *
     * @return string
     */   
    public function setFlightDatetimeAttribute($value)
    {
        return $this->attributes['flight_datetime'] = date("Y-m-d H:i:s", strtotime($value));
    }
}