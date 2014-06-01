'use strict';

describe('Service: Shelter', function () {

  // load the service's module
  beforeEach(module('frontendApp'));

  // instantiate service
  var Shelter;
  beforeEach(inject(function (_Shelter_) {
    Shelter = _Shelter_;
  }));

  it('should do something', function () {
    expect(!!Shelter).toBe(true);
  });

});
