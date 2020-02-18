import { TestBed } from '@angular/core/testing';

import { EventDetailsService } from './event-details.service';

describe('EventDetailsService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: EventDetailsService = TestBed.get(EventDetailsService);
    expect(service).toBeTruthy();
  });
});
