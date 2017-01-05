<?php

use Illuminate\Database\Seeder;
use App\Http\Controllers\ScheduleController;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create();

        $airport = factory(App\Airport::class)->create();

        factory(App\Flight::class, 20)->states('departure')->create();

        factory(App\Flight::class, 30)->states('arrival')->create();

        App\Flight::get()->each(function ($f) {
            $state = "newFlight";

            for ($count = 1 ; $count <= mt_rand(1,7); $count++)
            {
                if ($count !== 1)
                {
                    $state = "sameFlight";
                }

                $f->flightDays()->save(factory(App\FlightDay::class)->states($state)->make());
            }
        });

        factory(App\Controller::class, $airport->controllers)->create();
    }
}