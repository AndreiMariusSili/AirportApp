
angular.module("mainService", [])

.factory('User', function($http) {
    return {
        get : function() {
            return $http.get('/api/user')
        }
    }
})

.factory('Airport', function($http) {
    return {
        get : function() {
            return $http.get('/api/airport')
        }
    }
})