'use strict';

angular.module('frontendApp')
  .controller('UserHomeCtrl', function ($scope, Organization) {
    $scope.me = Organization.me();
    $scope.map = {
      center: {
        latitude: 39,
        longitude: -101
      },
      zoom: 10
    };
  });
