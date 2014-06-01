'use strict';

angular.module('frontendApp')
  .controller('MainCtrl', function ($scope, Organization, Auth) {
    $scope.map = {
      center: {
        latitude: 39,
        longitude: -101
      },
      zoom: 4,
      orgs: Organization.query()
    };

    $scope.loggedIn = Auth.loggedIn;
  });
