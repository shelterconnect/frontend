'use strict';

describe('Controller: UserhomeCtrl', function () {

  // load the controller's module
  beforeEach(module('frontendApp'));

  var UserhomeCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    UserhomeCtrl = $controller('UserhomeCtrl', {
      $scope: scope
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(scope.awesomeThings.length).toBe(3);
  });
});
