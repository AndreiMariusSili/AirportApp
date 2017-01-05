<?php

use App\Airport;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {

    return [
        'name' => "Super Admin",
        'email' => "super@admin.dev",
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Airport::class, function(Faker\Generator $faker) {

    return [
        'name' => "{$faker->city()}" . " " . "Airport",
        'lanes' => 20,
        'controllers' => 50,
        'take_off_time' => 60,
    ];
});

$factory->define(App\Flight::class, function(Faker\Generator $faker) {

    return [
        'code' => $faker->unique()->bothify('??###'),
        'carrier' => "{$faker->company()}" .  " " . "Airline",
    ];
});

$factory->state(App\Flight::class, 'departure', function(Faker\Generator $faker) {

    return [
        'departure_point' => Airport::firstOrFail()->name,
        'arrival_point' => $faker->city() . " " . "Airport",
        "type" => "departure",
    ];
});

$factory->state(App\Flight::class, 'arrival', function(Faker\Generator $faker) {

    return [
        'departure_point' => $faker->city() . " " . "Airport",
        'arrival_point' => Airport::firstOrFail()->name,
        "type" => "arrival",
    ];
});

$factory->define(App\FlightDay::class, function(Faker\Generator $faker) {
    return [
        
    ];
});

$factory->state(App\FlightDay::class, 'sameFlight', function($faker) {
    return [
        'day' => $faker->unique()->dayofWeek("Sunday"),
    ];
});

$factory->state(App\FlightDay::class, 'newFlight', function($faker) {
    return [
        'day' => $faker->unique(true)->dayOfWeek("Sunday")
    ];
});

$factory->define(App\Controller::class, function(Faker\Generator $faker){
    return [
        'code' => $faker->unique()->bothify('?##'),
        'name' => $faker->firstName(),
        'surname' => $faker->lastName(),
    ];
});

