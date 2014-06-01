'use strict';

describe('Controller: ShelterCtrl', function () {

  // load the controller's module
  beforeEach(module('frontendApp'));

  var ShelterCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    ShelterCtrl = $controller('ShelterCtrl', {
      $scope: scope
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(scope.awesomeThings.length).toBe(3);
  });
});
