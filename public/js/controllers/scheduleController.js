angular.module('ScheduleController', [])

.controller('createScheduleCtrl', function($routeParams, $scope) {

    // ScheduledFlight, Lanes, Controllers, CheckSchedule

    $scope.loadingFormData = true

    // ScheduledFlight.get($routeParams.id)
    //     .then(function(response) {
    //         $scope.flight = response.data
    //     })
        .finally(function () {
            var currentDate = new Date();
            var startOfWeek = moment().startOf("isoweek").toDate().getTime();
            var days = 7;

            var enabled = [true];
            
            for(var i in $scope.flight.flight_days)
            {
                enabled.push(moment().isoWeekday($scope.flight.flight_days[i].day).isoWeekday())
            }

            $scope.datepicker = {
                currentDate : currentDate,
                month : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                monthShort : ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                weekdaysFull : ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                weekdaysLetter : ['S', 'M', 'T', 'W', 'T', 'F', 'S'],
                disable : enabled,
                today : 'Today',
                clear : 'Clear',
                close : 'Done',
                minDate : (new Date(startOfWeek - ( 1000 * 60 * 60 *24 * days ))).toISOString(),
                maxDate : (new Date(startOfWeek + ( 2*(1000 * 60 * 60 *24 * days) -1 ))).toISOString(),
            }

            $scope.loadingFormData = false
        })

        $scope.showForm = function(date, time) {
                return((date != undefined && date != '') && (time != undefined && time != ''))
        }

        // $scope.loadForm = function(date, time)
        // {
        //     if(date != undefined && date != '')
        //     {
        //         var data = {
        //             id : $scope.flight.id,
        //             date: date
        //         }

        //         CheckSchedule.get(data)
        //             .then(
        //                 function sucessCallback(response) {
        //                     $scope.alreadyScheduled = response.data.alreadyScheduled
        //                 },
        //                 function errorCallback(response) {
        //                     console.log("The schedule could not be checked");
        //                 }
        //             )
        //         if (time != undefined && time != '')
        //         {
        //             datetime = {
        //                 value: date + " " + time
        //             }
        //             $scope.getAvailableLanes(datetime)
        //             $scope.getAvailableControllers(datetime)
        //         }
        //     }
        // }

        // $scope.getAvailableLanes = function(datetime)
        // {
        //     $scope.loadingLanes = true
        //     Lanes.get(datetime)
        //         .then (
        //             function sucessCallback(response) {
        //                 $scope.lanes = response.data
        //             },
        //             function errorCallback(response) {
        //                 console.log("The lanes could not be retrieved");
        //             }
        //         )
        //         .finally(function() {
        //             $scope.loadingLanes = false
        //         })
        // }

        // $scope.getAvailableControllers = function(datetime)
        // {
        //     $scope.loadingControllers = true
        //     Controllers.get(datetime)
        //         .then (
        //             function sucessCallback(response) {
        //                 $scope.controllers = response.data            
        //             },
        //             function errorCallback(response) {
        //                 console.log("The controllers could not be retrieved");
        //             }
        //         )
        //         .finally(function() {
        //             $scope.loadingControllers = false
        //     })
        // }

        // $scope.submitSchedule = function() {
        //     $flightData = {
        //         flight_id : $scope.flight.id,
        //         flight_datetime:$scope.flight.schedule.date + " " + $scope.flight.schedule.time,
        //         lane: $scope.flight.schedule.lane,
        //         controllers: $scope.flight.schedule.controllers
        //     }
        //     ScheduledFlight.submit($flightData)
        //         .then(
        //             function successCallback(response) {
        //                 $scope.showSchedule(response.data.id)
        //             },
        //             function errorCallback(response) {
        //                 console.log("The flight could not be sceduled.");
        //             }
        //         )
        // }
})

// .controller('showScheduleCtrl', function($routeParams, $scope, Schedule) {
//     $scope.loadingScheduleData = true;

//     Schedule.get($routeParams.id)
//         .then(function(response) {
//             $scope.schedule = response.data
//         })
//         .finally(function() {
//             $scope.loadingScheduleData = false;
//         })
// })