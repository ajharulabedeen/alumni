import { TestBed } from '@angular/core/testing';

import { EventUserService } from './event-user.service';

describe('EventUserService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: EventUserService = TestBed.get(EventUserService);
    expect(service).toBeTruthy();
  });
});
