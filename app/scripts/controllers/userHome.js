'use strict';

angular.module('frontendApp')
  .controller('UserHomeCtrl', function ($scope, Organization) {
    $scope.me = Organization.me();
  });
