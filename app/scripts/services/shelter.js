'use strict';

var apiBase;

angular.module('frontendApp')
  .factory('Shelter', function ($resource) {
    return $resource(apiBase + '/shelters/:id', {id:'@id'});
  });
