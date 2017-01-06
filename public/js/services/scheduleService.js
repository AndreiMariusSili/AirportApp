
angular.module("scheduleService", [])

.factory('Schedule', function($http) {
    return {
        get : function(id) {
            return $http.get('/api/schedule/show/' + id)
        }
    }
})

.factory('ScheduledFlight', function($http) {
    return {
        get : function(id) {
            return $http.get('/api/schedule/create/' + id)
        },
        
        submit: function(flightData) {
            return $http.post('api/schedule/store', flightData)
            
            // return $http({
            //     method: 'POST',
            //     headers: { 'Content-Type' : 'application/javascript' },
            //     url: 'api/schedule/store',
            //     data: $.param(flightData)
            // })
        }
    }
})

.factory('Lanes', function($http) {
    return {
        get : function(datetime) {
            return $http.post('api/schedule/lanes', datetime)

            // return $http({
            //     method: 'POST',
            //     headers: { 'Content-Type' : 'application/javascript' },
            //     url: 'api/schedule/lanes',
            //     data: $.param(datetime)
            // })
        }
    }
})

.factory('CheckSchedule', function($http) {
    return {
        get : function(data) {
            return $http.post('api/schedule/check', data)

            // return $http({
            //     method: 'POST',
            //     headers: { 'Content-Type' : 'application/javascript' },
            //     url: 'api/schedule/check',
            //     data: $.param(data)
            // })
        }
    }
})

.factory('Controllers', function($http) {

    return {
        get : function($datetime) {
            return $http.post('api/schedule/controllers', datetime)

            // return $http({
            //     method: 'POST',
            //     headers: { 'Content-Type' : 'application/javascript' },
            //     url: 'api/schedule/controllers',
            //     data: $.param(datetime)
            // })
        }
    }
})
