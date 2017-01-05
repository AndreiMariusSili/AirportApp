<?php

namespace App;

use App\Flight;
use Illuminate\Database\Eloquent\Model;

class FlightDay extends Model
{
    protected $fillable = [
        'day',
    ];

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }
}
