import { TestBed } from '@angular/core/testing';

import { EventDetailsUserService } from './event-details-user.service';

describe('EventDetailsUserService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: EventDetailsUserService = TestBed.get(EventDetailsUserService);
    expect(service).toBeTruthy();
  });
});
