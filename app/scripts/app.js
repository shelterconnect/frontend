'use strict';

var apiBase = 'https://shelterconnect.ngrok.com';

// @if DEBUG
apiBase = 'https://shelterconnect.ngrok.com';
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
  .config(function ($routeProvider, $httpProvider) {
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
      .when('/shelters', {
        templateUrl: 'views/shelters.html',
        controller: 'SheltersCtrl',
      })
      .when('/shelters/:id', {
        templateUrl: 'views/shelter.html',
        controller: 'ShelterCtrl',
      })
      .otherwise({
        redirectTo: '/'
      });

    $httpProvider.interceptors.push('authInterceptor');
  });
