
angular.module("flightService", [])

.factory('Flights', function($http) {
    return {
        get : function() {
            return $http.get('/api/flights')
        },
    }
})

.factory('Departures', function($http) {
    return {
        get : function() {
            return $http.get('/api/flights/departure')
        }
    }
})

.factory('Arrivals', function($http) {
    return {
        get : function() {
            return $http.get('/api/flights/arrival')
        },
    }
})

.factory('Flight', function($http) {
    return {
        getInfo : function(id) {
            return $http.get('api/flights/' + 'info/' + id)
        },
        getSchedule : function(id) {
            return $http.get('api/flights/' + 'schedule/' + id)
        },
        getHistory : function(id) {
            return $http.get('api/flights/' + 'history/' + id)
        }
    }
})