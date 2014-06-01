'use strict';

angular.module('frontendApp')
  .controller('AuthFormMapCtrl', function ($scope) {
    $scope.map = {
      center: {
        latitude: 34.0141392,
        longitude: -118.2866044
      },
      zoom: 12
    };
  });
