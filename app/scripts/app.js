'use strict';

var apiBase = 'https://shelterconnect.ngrok.com';

// @if DEBUG
apiBase = 'http://localhost:3000';
// @endif

angular
  .module('frontendApp', [
    'ngCookies',
    'ngResource',
    'ngSanitize',
    'ngRoute',
    'mm.foundation',
    'google-maps'
  ])
  .config(function ($routeProvider, $locationProvider) {
    $routeProvider
      .when('/', {
        templateUrl: 'views/main.html',
        controller: 'MainCtrl'
      })
      .when('/login', {
        templateUrl: 'views/login.html',
        controller: 'LoginCtrl'
      })
      .otherwise({
        redirectTo: '/'
      });

    $locationProvider.html5Mode(true);
  });
