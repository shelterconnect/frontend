'use strict';

angular.module('frontendApp')
  .controller('AuthFormMapCtrl', function ($scope) {
    $scope.map = {
      center: {
        latitude: 39,
        longitude: -101
      },
      zoom: 4
    };
  });
