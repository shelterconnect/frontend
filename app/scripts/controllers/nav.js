'use strict';

angular.module('frontendApp')
  .controller('NavCtrl', function ($scope, $location, Auth) {
    $scope.isActive = function (viewLocation) {
      return viewLocation === $location.path();
    };

    $scope.loggedIn = Auth.loggedIn;

    $scope.logout = Auth.logout;
  });
