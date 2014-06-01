'use strict';

angular.module('frontendApp')
  .controller('RegisterCtrl', function ($scope, $location, Auth) {
    $scope.map = {
      center: {
        latitude: 39,
        longitude: -101
      },
      zoom: 4
    };

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
        $location.path('/login');
      }, function () {
        $scope.message = 'Error creating account.';
      });
    };
  });
