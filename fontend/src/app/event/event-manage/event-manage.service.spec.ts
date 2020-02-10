import { TestBed } from '@angular/core/testing';

import { EventManageService } from './event-manage.service';

describe('EventManageService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: EventManageService = TestBed.get(EventManageService);
    expect(service).toBeTruthy();
  });
});
