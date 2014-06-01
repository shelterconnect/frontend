'use strict';

var apiBase = 'https://shelterconnect.ngrok.com';

// @if DEBUG
apiBase = 'http://localhost:3000';
// @endif

var userRoles = {
  public: undefined,
  shelter: 1,
  restaurant: 2,
  church: 3
};

angular
  .module('frontendApp', [
    'ngCookies',
    'ngResource',
    'ngSanitize',
    'ngRoute',
    'mm.foundation',
    'google-maps',
    'ngGeolocation'
  ])
  .config(function ($routeProvider) {
    var access = userRoles;

    $routeProvider
      .when('/', {
        templateUrl: 'views/main.html',
        controller: 'MainCtrl',
        access: access.public
      })
      .when('/login', {
        templateUrl: 'views/login.html',
        controller: 'LoginCtrl',
        access: access.public
      })
      .when('/register', {
        templateUrl: 'views/register.html',
        controller: 'RegisterCtrl',
      })
      .when('/shelters/:id', {
        templateUrl: 'views/shelter.html',
        controller: 'ShelterCtrl',
      })
      .otherwise({
        redirectTo: '/'
      });
  });
