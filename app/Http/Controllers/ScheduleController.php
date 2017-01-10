<?php

namespace App\Http\Controllers;

use App\Flight;
use App\Airport;
use App\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ScheduleController extends Controller
{
    /**
     *  Set the number of lanes and the turnover at initialization.
     *
     * @return null
     */
    public function __construct()
    {
        $this->lanes = Airport::firstOrFail()->lanes;
        $this->take_off_time = Airport::firstOrFail()->take_off_time;
    }

    /**
     *  Get an instance of a schedule with attached controllers.
     *
     * @var string $id
     * @return JSON
     */
    public function show($id)
    {
        $schedule = Schedule::with('controllers')->where('id', '=', $id)->firstOrFail()->toArray();
        return response()->json($schedule);
    }

    /**
     *  Get an instance of the flight with attached flight days.
     *
     * @var string
     * @return JSON
     */
    public function create($id)
    {
        $flight = Flight::with('flightDays')->where('id', '=', $id)->firstOrFail()->toArray();

        return response()->json($flight);
    }

    /**
     *  Persist a new schedule to the database and attach controllers.
     *
     * @var Illuminate\Http\Request;
     * @return JSON
     */
    public function store(Request $request)
    {
        $schedule = (new Schedule);

        $schedule->flight_id = $request["flight_id"];
        $schedule->flight_datetime = $request["flight_datetime"];
        $schedule->lane = $request["lane"];

        $schedule->status = "on time";

        $schedule->save();

        foreach ($request->controllers as $id)
        {
            $schedule->controllers()->attach($id);
        }

        return response()->json(["id" => $schedule->id]);
    }

    /**
     *  check if flight is already scheduled in a day.
     *
     * @var Illuminate\Http\Request;
     * @return JSON
     */
    public function check(Request $request)
    {
        $id = $request->id;
        $date = new Carbon($request->date);

        try {
           Schedule::where('flight_id', '=', $id)->whereDate('flight_datetime' ,  $date)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return response()->json(["alreadyScheduled" => false]);
        }

        return response()->json(["alreadyScheduled" => true]);

    }

    /**
     *  Get available lanes.
     *
     * @var Illuminate\Http\Request;
     * @return JSON
     */
    public function getAvailableLanes(Request $request)
    {

        $scheduledDateTime = new Carbon($request->value);

        $existingDateTimes = Schedule::get()->pluck('flight_datetime', 'lane');

        $lanes = [];
        for ($i = 1; $i <= $this->lanes; $i++)
        {
            $available = true;

            foreach ($existingDateTimes as $lane => $datetime)
            {
                $timeDiff = $scheduledDateTime->diffInMinutes((new Carbon($datetime)));
                if ($i === $lane && $timeDiff <= $this->take_off_time )
                {
                    $available = false;
                }
            }

            if ($available)
            {
                array_push($lanes, $i);
            }
            
        }
        return response()->json($lanes);
    }

    /**
     *  Get available controllers.
     *
     * @var Illuminate\Http\Request;
     * @return JSON
     */
    public function getAvailableControllers(Request $request)
    {
        $scheduledDateTime = new Carbon($request->value);

        $timeTop = $scheduledDateTime->addMinutes($this->take_off_time)->toDateTimeString();
        $timeBottom = $scheduledDateTime->subMinutes(2*$this->take_off_time)->toDateTimeString();

        $controllers = DB::table('controllers')        
            ->whereNotExists(function ($query) use ($timeBottom, $timeTop) {
                $query->select()
                      ->from('schedules')
                      ->join('controller_schedule', 'schedules.id', '=', 'controller_schedule.schedule_id')
                      ->whereRaw('controllers.id = controller_schedule.controller_id')
                      ->whereBetween('schedules.flight_datetime', [$timeBottom, $timeTop]);
            })
            ->get();

        return response()->json($controllers);
    }
}
