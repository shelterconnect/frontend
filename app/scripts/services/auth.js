'use strict';

var apiBase, userRoles;

angular.module('frontendApp')
  .factory('Auth', function ($rootScope, $cookieStore, $http) {
    var currentUser = $cookieStore.get('user') ||
      { email: '', type: userRoles.public };

    return {
      isLoggedIn: function (user) {
        if (user === undefined) {
          user = $rootScope.user;
        }

        return user.type === userRoles.shelter ||
          user.type === userRoles.restaurant ||
          user.type === userRoles.church;
      },

      register: function (user, success, error) {
        $http.post(apiBase + '/organizations', user).success(success).
          error(error);
      },

      login: function (user, success, error) {
        $http.post(apiBase + '/organizations/authenticate', user).
          success(function (data) {
            $rootScope.token = data.token;
            success(data);
          }).error(error);
      },

      logout: function () {
        $rootScope.user = {
          email: '',
          type: userRoles.public
        };
      },

      userRoles: userRoles,
      user: currentUser
    };
  });
