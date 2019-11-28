import { Injectable } from '@angular/core';
import { PaymentType } from './payment-type.model';
import { AuthService } from '../../auth/auth.service';
import { HttpClient } from '@angular/common/http';
import { BehaviorSubject } from 'rxjs';
import { combineAll } from 'rxjs/operators';
@Injectable({
  providedIn: 'root'
})
export class PaymentTypeService {

  pts = new BehaviorSubject<any>(null);

  constructor(private http: HttpClient, private authService: AuthService) { }

  public create(pt: PaymentType) {
    console.log(pt);
    this.http.post(
      'http://127.0.0.1:8000/paymentType/create ', pt, this.authService.getHeader()
    ).subscribe((res: Response) => {
      console.log(res);
    });
  }

  public getAllPayments() {
    //pt = paymentType
    this.pts = new BehaviorSubject<any>(null);
    return this.http.post<PaymentType>(
      'http://127.0.0.1:8000/paymentType/getAllPaymentType',
      {
        'per_page': '10',
        "sort_by": "ASC",
        "sort_on": "last_date"
      },
      this.authService.getHeader(),
    ).subscribe((pt: PaymentType) => {
      // console.log("One Job : " + pt["0"]["organization_name"]);
      console.log(pt);
      this.pts.next(pt);
    });
  }

}//
