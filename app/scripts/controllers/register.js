'use strict';

angular.module('frontendApp')
  .controller('RegisterCtrl', function ($scope, Auth) {
    $scope.user = {};
    $scope.message = '';
    $scope.types = [
      'Shelter',
      'Restaurant',
      'Volunteer Group'
    ];
    $scope.submit = function () {
      Auth.register($scope.user, function () {
        $scope.message = 'Account created successfully.';
      }, function () {
        $scope.message = 'Error creating account.';
      });
    };
  });
