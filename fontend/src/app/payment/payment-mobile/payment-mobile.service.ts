import { Injectable } from '@angular/core';
import { PaymentMobile } from './payment-mobile.model';

@Injectable({
  providedIn: 'root'
})
export class PaymentMobileService {

  constructor() { }

  public savePaymetMobile(ptm: PaymentMobile) {
    console.log(ptm);
  }


}//class
