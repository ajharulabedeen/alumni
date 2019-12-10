import { TestBed } from '@angular/core/testing';

import { PaymentMobileService } from './payment-mobile.service';

describe('PaymentMobileService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: PaymentMobileService = TestBed.get(PaymentMobileService);
    expect(service).toBeTruthy();
  });
});
