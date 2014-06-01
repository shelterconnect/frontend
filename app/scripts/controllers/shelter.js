'use strict';

var userRoles;

angular.module('frontendApp')
  .controller('ShelterCtrl', function ($scope, $routeParams, Organization) {
    $scope.shelter = Organization.get({id:$routeParams.id}, function (data) {
      if (data.type !== userRoles.shelter) {
        $scope.shelter = undefined;
      }
    });
  });
