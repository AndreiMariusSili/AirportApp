<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lanes',
        'controllers',
        'take_off_time',
    ];
    /**
     * the table that is bound to the model.
     *
     * @var string
     */
    protected $table = "airport";

}
