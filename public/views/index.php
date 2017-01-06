<!DOCTYPE html>
<html>
<head>
    <title>AirportApp</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="/css/materialize.clockpicker.css">
</head>
<body ng-app="AirportApp" ng-controller="mainCtrl">

    <nav ng-model="airport">
        <div class="nav-wrapper indigo">
            <a href="#" data-activates="slide-out" class="button-collapse show-on-large"><i class="material-icons">menu</i></a>
            <a class="brand-logo">AirportApp</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a class="waves-effect" id="modalTrigger" href="#airportInfo" modal><i class="large material-icons">info_outline</i></a></li>
            </ul>
        </div>
    </nav>

    <ul id="slide-out" class="side-nav" ng-model="user">
        <li>
            <div class="userView">
                <div class="background">
                    <img src="office.jpg">
                </div>
                <span class="white-text name">{{user.name}}</span>
                <span class="white-text email">{{user.email}}</span>
            </div>
        </li>
        <li>
            <a class="waves-effect" ng-click="showFlights()">Flights</a>
        </li>
        <li>
            <div class="divider"></div>
        </li>
        <li>
            <a class="waves-effect" ng-click="showDepartures()">Departures</a>
        </li>
        <li>
            <a class="waves-effect" ng-click="showArrivals()">Arrivals</a>
        </li>
    </ul>

    <div class="container">
        <div ng-view></div>
    </div>

    <div id="airportInfo" class="modal bottom-sheet">
        <div class="modal-content" ng-model="airport">
            <h4>{{airport.name}}</h4>
            <table class="z-depth-3">
                <thead>
                  <tr>
                    <th data-field="lanes">Lanes</th>
                    <th data-field="controllers">Controllers</th>
                    <th data-field="take_off_time">Turnover Time</th>
                  </tr>
                </thead>
                <tbody ng-model="airport">
                  <tr>
                    <td>{{airport.lanes}}</td>
                    <td>{{airport.controllers}}</td>
                    <td>{{airport.take_off_time}} min</td>
                  </tr>
                </tbody>
          </table>
        </div>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script type="text/javascript" src="/js/angular.min.js"></script>
    <script type="text/javascript" src="/js/angular-animate.min.js"></script>
    <script type="text/javascript" src="/js/angular-aria.min.js"></script>
    <script type="text/javascript" src="/js/angular-route.min.js"></script>

    <script type ="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular-materialize/0.2.2/angular-materialize.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
    <script type="text/javascript" src="/js/materialize.clockpicker.js"></script>
    
    <script type="text/javascript" src="/js/controllers/mainController.js"></script>
    <script type="text/javascript" src="/js/controllers/flightController.js"></script>
    <script type="text/javascript" src="/js/controllers/scheduleController.js"></script>

    <script type="text/javascript" src="/js/services/mainService.js"></script>
    <script type="text/javascript" src="/js/services/flightService.js"></script>
    <script type="text/javascript" src="/js/services/scheduleService.js"></script>
    <script type="text/javascript" src="/js/app.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $(".button-collapse").sideNav();
        })
    </script>

    <style type="text/css">
        .container {
            padding-bottom: 2rem !important;
        }
        .airportName {
            font-size: 2.1rem;
            padding-right: 1rem;
        }
        .loader-position {
            position: absolute; 
            left: 50%;
            margin-top: 20%;
        }

        .search:focus {
            border-bottom: 1px solid #3F51B5 !important;
            box-shadow: 0 1px 0 0 #3F51B5 !important;
        }

        button:focus {
            background-color: transparent !important;
        }
        button:hover {
            background-color: #3F51B5 !important;
            color: rgb(255,255,255) !important;
        }

        table {
            background-color: rgb(255,255,255)
        }

        .highlight tbody tr:hover td, .highlight tbody tr:hover th {
            background-color: #3F51B5 !important;
            color: rgb(255,255,255) !important;
            border-radius: 0 !important;
            border-color: #3F51B5 !important;
        }

        tr:focus {
         outline: none;
     }
     div.picker__day.picker__day--infocus.picker__day--selected.picker__day--highlighted {
        background-color:  #3f51b5 !important;
        color: #fff !important;
    }

    button.picker__today, button.picker__close {
        color: #000 !important;
    }
    button.picker__today:hover, button.picker__close:hover {
        color: #fff !important;
    }
    .picker__date-display, .picker__weekday-display{
        background-color: #3f51b5 !important;
    }

    .picker__nav--prev:hover, .picker__nav--next:hover {
        background-color: #3f51b5 !important;
    }
    .picker__day.picker__day--today {
        color: #3f51b5 !important;
    }

    .clockpicker-display {
        color: #7986cb !important;
    }

    .clockpicker-tick.active, .clockpicker-tick:hover {
        background-color: #3f51b5 !important;
    }

    .dropdown-content li>a, .dropdown-content li>span {
        color: #3f51b5 !important;
    }
    [type="checkbox"]:checked+label:before {
        border-right: 2px solid #3f51b5 !important;
        border-bottom: 2px solid #3f51b5 !important;

    }
</style>

</body>
</html>