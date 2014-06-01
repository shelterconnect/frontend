'use strict';

var apiBase, userRoles;

angular.module('frontendApp')
  .factory('Auth', function ($rootScope, $cookieStore, $http) {
    var token = $cookieStore.get('token');

    return {
      //isLoggedIn: function (user) {
        //if (user === undefined) {
          //user = $rootScope.user;
        //}

        //return user.type === userRoles.shelter ||
          //user.type === userRoles.restaurant ||
          //user.type === userRoles.church;
      //},

      register: function (user, success, error) {
        $http.post(apiBase + '/organizations', user).success(success).
          error(error);
      },

      login: function (user, success, error) {
        $http.post(apiBase + '/organizations/authenticate', user).
          success(function (data) {
            token = data.token;
            $cookieStore.put('token', data.token);
            success(data);
          }).error(error);
      },

      logout: function () {
        token = null;
        $cookieStore.remove('token');
      },

      userRoles: userRoles,
      token: token,
      loggedIn: function () {
        return token !== null && token !== undefined;
      }
    };
  });
