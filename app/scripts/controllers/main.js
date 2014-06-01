'use strict';

angular.module('frontendApp')
  .controller('MainCtrl', function ($scope) {
    $scope.map = {
      center: {
        latitude: 39,
        longitude: -101
      },
      zoom: 4
    };
  });
