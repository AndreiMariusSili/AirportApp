<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", function() {
    return view('index');
});

Route::group(array('prefix' => 'api'), function () {

    Route::get('user', 'MainController@getUser');
    Route::get('airport', 'MainController@getAirport');

    Route::get('flights', 'FlightController@getFlightsOverview');
    Route::get('flights/{type}', 'FlightController@getFlights');
    Route::get('flights/info/{id}', 'FlightController@getFlightInfo');
    Route::get('flights/schedule/{id}', 'FlightController@getFlightSchedule');
    Route::get('flights/history/{id}', 'FlightController@getFlightHistory');

    Route::get('schedule/show/{id}', 'ScheduleController@show');
    Route::get('schedule/create/{id}', 'ScheduleController@create');

    Route::post('schedule/check', 'ScheduleController@check');
    Route::post('schedule/lanes', 'ScheduleController@getAvailableLanes');
    Route::post('schedule/controllers', 'ScheduleController@getAvailableControllers');
    Route::post('schedule/store', 'ScheduleController@store');
});

Route::get('/{any?}/{other?}/{route?}', function () {
    return redirect("/");
});