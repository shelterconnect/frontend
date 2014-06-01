'use strict';

angular.module('frontendApp')
  .factory('authInterceptor', function ($q, $cookieStore) {
    return {
      request: function (config) {
        config.headers = config.headers || {};
        if ($cookieStore.get('token')) {
          config.headers.Authorization = 'Bearer ' + $cookieStore.get('token');
        }
        return config;
      },
      response: function (response) {
        return response || $q.when(response);
      }
    };
  });
