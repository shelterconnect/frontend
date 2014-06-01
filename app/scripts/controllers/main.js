'use strict';

angular.module('frontendApp')
  .controller('MainCtrl', function ($scope, Organization) {
    $scope.map = {
      center: {
        latitude: 39,
        longitude: -101
      },
      zoom: 4,
      orgs: Organization.query()
    };
  });
