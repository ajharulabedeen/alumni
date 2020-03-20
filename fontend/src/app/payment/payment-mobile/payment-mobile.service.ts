import {Injectable} from '@angular/core';
import {PaymentMobile} from './payment-mobile.model';
import {HttpClient} from '@angular/common/http';
import {AuthService} from '../../auth/auth.service';
import {BehaviorSubject} from 'rxjs';
import {PaymentType} from '../payment-type/payment-type.model';

@Injectable({
  providedIn: 'root'
})
export class PaymentMobileService {

  myMobilePayments = new BehaviorSubject<any>(null);
  onePaymentType = new BehaviorSubject<any>(null);

  constructor(private http: HttpClient, private authService: AuthService) {
  }

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
      'http://127.0.0.1:8000/api/payment/mobile/getAllPaymentMobileByAUser', {},
      this.authService.getHeader(),
    ).subscribe((ptm: PaymentMobile) => {
      // console.log("One Job : " + pt["0"]["organization_name"]);
      console.log(ptm);
      this.myMobilePayments.next(ptm);
    });
  }


  public getOnePayementType(id: string) {
    this.onePaymentType = new BehaviorSubject<any>(null);
    return this.http.post<PaymentType>(
      'http://127.0.0.1:8000/api/paymentType/findOnePaymentType', {'id': id},
      this.authService.getHeader(),
    ).subscribe((ptm: PaymentType) => {
      // console.log(ptm);
      this.onePaymentType.next(ptm);
    });
    console.log(this.onePaymentType);
  }


  public getApprovedByUserDetails(user_id: string) {
    return this.http.post<any>(
      'http://127.0.0.1:8000/payment/mobile/getApprovedUserDetails', {'user_id': user_id},
      this.authService.getHeader(),
    );
    //   .subscribe((res: any) => {
    //   console.log(res);
    //   // this.onePaymentType.next(ptm);
    // });
  }
}//class
