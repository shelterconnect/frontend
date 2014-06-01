'use strict';

angular.module('frontendApp')
  .controller('LoginCtrl', function ($scope, Auth) {
    $scope.user = { email: '', password: '' };
    $scope.message = '';
    $scope.submit = function () {
      Auth.login($scope.user, function () {
        $scope.message = 'Login successful!';
      }, function () {
        $scope.message = 'Invalid email or password.';
      });
    };
  });
