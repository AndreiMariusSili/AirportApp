<?php

namespace App\Http\Controllers;

use App\User;
use App\Airport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    /**
     *  Get the user of the application.
     *
     * @return JSON
     */
    public function getUser()
    {
        return response()->json(User::firstOrFail());
    }

    /**
     *  Get information about the airport.
     *
     * @return JSON
     */
    public function getAirport()
    {
        return response()->json(Airport::firstOrFail());
    }

}
