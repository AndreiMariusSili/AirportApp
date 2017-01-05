
angular.module('mainController', [])

.controller('showFlightsCtrl', function($scope, Flights) {
    $scope.loadingFlights = true
    Flights.get()
        .then(function(response) {
            $scope.flights = response.data
        })
        .finally(function() {
            $scope.loadingFlights = false;
        })
})

.controller('showDeparturesCtrl', function($scope, Departures) {
    $scope.loadingFlights = true
    Departures.get()
        .then(function(response) {
            $scope.departures = response.data
        })
        .finally(function() {
            $scope.loadingFlights = false;
        })
})

.controller('showArrivalsCtrl', function($scope, Arrivals) {
    $scope.loadingFlights = true
    Arrivals.get()
        .then(function(response) {
            $scope.arrivals = response.data
        })
        .finally(function() {
            $scope.loadingFlights = false;
        })
})

.controller('mainCtrl', function($scope, $http, $location, User, Airport, Departures, Arrivals) {
    User.get()
        .then(function(response) {
            $scope.user = response.data
        })
    Airport.get()
        .then(function(response) {
            $scope.airport = response.data
    })

    $scope.showFlights = function()
    {
        $location.path('/flights')
    }

    $scope.showDepartures = function()
    {
        $location.path('/departures')
    }

    $scope.showArrivals = function()
    {
        $location.path('/arrivals');
    }

    $scope.showFlight = function(id)
    {
        $location.path('/flight/' + id)
    }

    $scope.createSchedule = function(id)
    {
        $location.path('/schedule/create/' + id)
    }

    $scope.showSchedule = function(id)
    {
        $location.path('/schedule/show/' + id)
    }
})