'use strict';

var apiBase;

angular.module('frontendApp')
  .factory('Organization', function ($resource) {
    return $resource(apiBase + '/organizations/:id', {id: '@id'}, {
      me: {method:'GET', params:{id:'me'}}
    });
  });
