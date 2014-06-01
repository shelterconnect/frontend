'use strict';

angular.module('frontendApp')
  .controller('ShelterCtrl', function ($scope, $routeParams, Shelter) {
    $scope.shelter = Shelter.get({id:$routeParams.id});
  });
