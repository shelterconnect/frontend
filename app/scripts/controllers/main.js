'use strict';

angular.module('frontendApp')
  .controller('MainCtrl', function ($scope, Organization, Auth) {
    $scope.map = {
      center: {
        latitude: 33.9587073,
        longitude: -118.2634171 
      },
      zoom: 10,
      orgs: Organization.query()
    };

    $scope.loggedIn = Auth.loggedIn;
  });
