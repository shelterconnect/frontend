'use strict';

angular.module('frontendApp')
  .controller('LoginCtrl', function ($scope, $location, Auth) {
    $scope.map = {
      center: {
        latitude: 39,
        longitude: -101
      },
      zoom: 4
    };

    $scope.user = { email: '', password: '' };
    $scope.message = '';
    $scope.submit = function () {
      Auth.login($scope.user, function () {
        $scope.message = 'Login successful!';
        $location.path('/');
        $location.path('/');
      }, function () {
        $scope.message = 'Invalid email or password.';
      });
    };
  });
