<?php

namespace App;

use App\Schedule;
use Illuminate\Database\Eloquent\Model;

class Controller extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */    
    protected $fillable = [
    'code',
    'name',
    'surname',
    ];

    /**
     * A controller has many scheduled flights.
     *
     * @return  Illuminate\Database\Eloquent\hasMany
     */   
    public function schedules()
    {
        return $this->hasMany(Schedule::class)->withTimestamps();
    }

    /**
     * Format the code attribute on get.
     *
     * @return  string
     */   
    public function getCodeAttribtue($value)
    {
        return strtoupper($value);
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

}