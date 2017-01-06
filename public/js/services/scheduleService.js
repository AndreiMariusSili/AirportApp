
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
        }
    }
})

.factory('Lanes', function($http) {
    return {
        get : function(datetime) {
            return $http.post('api/schedule/lanes', datetime)
        }
    }
})

.factory('CheckSchedule', function($http) {
    return {
        get : function(data) {
            return $http.post('api/schedule/check', data)
        }
    }
})

.factory('Controllers', function($http) {
    return {
        get : function($datetime) {
            return $http.post('api/schedule/controllers', datetime)
        }
    }
})
