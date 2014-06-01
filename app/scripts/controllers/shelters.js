'use strict';

angular.module('frontendApp')
  .controller('SheltersCtrl', function ($scope, Shelter) {
    $scope.shelters = Shelter.query();
  });
