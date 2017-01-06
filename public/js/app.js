var AirportApp = angular.module("AirportApp", ["ngRoute", "ui.materialize", "mainController", "flightController", "ScheduleController", "mainService", "flightService", "scheduleService"])

AirportApp.config(['$locationProvider', '$routeProvider', function($locationProvider, $routeProvider) {

        $locationProvider.hashPrefix('');

        $routeProvider
            .when('/', {
                templateUrl : 'views/partials/flights.html',
                controller : 'showFlightsCtrl'
            })

            .when('/departures', {
                templateUrl : 'views/partials/departures.html',
                controller : 'showDeparturesCtrl'
            })

            .when('/arrivals', {
                templateUrl : 'views/partials/arrivals.html',
                controller : 'showArrivalsCtrl'
            })

            .when('/flight/:id', {
                templateUrl : 'views/partials/flight.html',
                controller : "flightCtrl",
            })

            .when('/schedule/show/:id', {
                templateUrl: 'views/partials/schedule.html',
                controller: 'showScheduleCtrl'
            })

            .when('/schedule/create/:id', {
                templateUrl : 'views/partials/createSchedule.html',
                controller : 'createScheduleCtrl'
            })

            .otherwise( {
                redirectTo: '/'
            })


    }])


