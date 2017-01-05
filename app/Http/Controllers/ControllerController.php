<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ControllerController extends Controller
{
    /**
     * Get a list of all controllers.
     *
     * @return JSON
     */
    public function index()
    {
        return response()->json(\App\Controller::get()->toArray());
    }

}
