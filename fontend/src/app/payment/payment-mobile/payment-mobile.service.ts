import { Injectable } from '@angular/core';
import { PaymentMobile } from './payment-mobile.model';
import { HttpClient } from '@angular/common/http';
import { AuthService } from '../../auth/auth.service';
import { BehaviorSubject } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class PaymentMobileService {

  myMobilePayments = new BehaviorSubject<any>(null);

  constructor(private http: HttpClient, private authService: AuthService) { }

  public savePaymetMobile(ptm: PaymentMobile) {
    console.log(ptm);
    this.http.post(
      'http://127.0.0.1:8000/api/payment/mobile/create', ptm, this.authService.getHeader()
    ).subscribe((res: Response) => {
      console.log(res);
    });
  }


  public getAllMyPayments() {
    this.myMobilePayments = new BehaviorSubject<any>(null);
    return this.http.post<PaymentMobile>(
      'http://127.0.0.1:8000/api/payment/mobile/getAllPaymentMobileByAUser',{},
      this.authService.getHeader(),
    ).subscribe((ptm: PaymentMobile) => {
      // console.log("One Job : " + pt["0"]["organization_name"]);
      // console.log(ptm);
      this.myMobilePayments.next(ptm);
    });
  }


}//class
