'use strict';

angular.module('frontendApp')
  .controller('LoginCtrl', function ($scope, Auth) {
    $scope.user = { email: '', password: '' };
    $scope.message = '';
    $scope.submit = function () {
      Auth.login($scope.user, function (data) {
        $scope.message = 'Login successful!';
      }, function (data) {
        $scope.message = 'Invalid email or password.';
      });
    };
  });
