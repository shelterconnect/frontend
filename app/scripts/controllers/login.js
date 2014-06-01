'use strict';

angular.module('frontendApp')
  .controller('LoginCtrl', function ($scope) {
    $scope.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];
    $scope.map = {
      center: {
        latitude: 39,
        longitude: -101
      },
      zoom: 4
    };
  });
