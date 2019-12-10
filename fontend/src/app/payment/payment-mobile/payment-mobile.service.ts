import { Injectable } from '@angular/core';
import { PaymentMobile } from './payment-mobile.model';
import { HttpClient } from '@angular/common/http';
import { AuthService } from '../../auth/auth.service';

@Injectable({
  providedIn: 'root'
})
export class PaymentMobileService {

  constructor(private http : HttpClient, private authService : AuthService) { }

  public savePaymetMobile(ptm: PaymentMobile) {
    console.log(ptm);
    this.http.post(
      'http://127.0.0.1:8000/payment/mobile/create ', ptm, this.authService.getHeader()
    ).subscribe((res: Response) => {
      console.log(res);
    });
  }


}//class
