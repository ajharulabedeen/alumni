import { TestBed } from '@angular/core/testing';

import { NewsPublicService } from './news-public.service';

describe('NewsPublicService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: NewsPublicService = TestBed.get(NewsPublicService);
    expect(service).toBeTruthy();
  });
});
