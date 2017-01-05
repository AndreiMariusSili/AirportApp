<?php

namespace App\Http\Controllers;

use App\Flight;
use App\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FlightController extends Controller
{
    /**
     *  Get a list of departures/arrivals;
     *
     * @var string
     * @return JSON
     */
    public function getFlights($type)
    {
        $flights = Flight::where('type', '=', $type)->get()->toArray();

        return response()->json($flights);
    }

    /**
     *  Get a list of all flights
     *
     * @return JSON
     */
    public function getFlightsOverview()
    {
        $flights = Flight::orderBy('type')->get()->toArray();

        return response()->json($flights);
    }

    /**
     *  Get an instance of a flight with its relations.
     *
     * @var string 
     * @return JSON
     */
    public function getFlightInfo($id)
    {
        try {
            $info = Flight::with(['schedules', 'flightDays'])->where('id', '=', $id)->firstOrFail()->toArray();
        } catch (ModelNotFoundException $e) {
            return response()->json(array("message" => "Flight not found. Please check the flight code again."));
        }
        return response()->json($info);
    }

    /**
     *  Get a list of scheduled instances that belong to a flight.
     *
     * @var string
     * @return JSON
     */
    public function getFlightSchedule($id)
    {
        $now = Carbon::now();
        try {
            $schedule = Schedule::where('flight_id', '=', $id)->where('flight_datetime', '>', $now)->orderBy('flight_datetime', 'desc')->get()->toArray();
        } catch (ModelNotFoundException $e) {
            return response()->json(array("message" => "Flight not found. Please check the flight code again."));
        }

        return response()->json($schedule);
    }

    /**
     *  Get a list of past instances that belong to a flight.
     *
     * @var string $type
     * @return JSON
     */
    public function getFlightHistory($id)
    {
        $now = Carbon::now();
        $lastWeekstart = Carbon::createFromTimestamp(strtotime('last week Monday'));
        try {
            $history = Schedule::where('flight_id', '=', $id)->where('flight_datetime', '<=', $now)->where('flight_datetime', ">=", $lastWeekstart)->orderBy('flight_datetime', 'desc')->get()->toArray();
        } catch (ModelNotFoundException $e) {
            return response()->json(array("message" => "Flight not found. Please check the flight code again."));
        }

        return response()->json($history);
    }
}