angular.module('flightController', [])

.controller('flightCtrl', function($routeParams, $scope, Flight) {

    $scope.loadingFlightData = true

    Flight.getInfo($routeParams.id)
    .then(function(response) {
        $scope.flightInfo = response.data
    }).finally(function() {
        Flight.getSchedule($routeParams.id)
        .then(function(response) {
            $scope.flightSchedule = response.data
        }).finally(function() {
            Flight.getHistory($routeParams.id)
            .then(function(response) {
                $scope.flightHistory = response.data
            }).finally(function() {
                $scope.loadingFlightData = false
            })
        })
    })

    $scope.checkDay = function(day, days) {
        if($scope.loadingFlightData == false)
        {
            check = false

            days.forEach(function(schedule) {
                if(day == schedule.day)
                {
                    check = true
                }
            })

            return check;
        }

        

    }
})