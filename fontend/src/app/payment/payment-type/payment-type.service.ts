import {Injectable} from '@angular/core';
import {PaymentType} from './payment-type.model';
import {AuthService} from '../../auth/auth.service';
import {HttpClient} from '@angular/common/http';
import {BehaviorSubject} from 'rxjs';
import {combineAll} from 'rxjs/operators';
import {PaymentMobile} from '../payment-mobile/payment-mobile.model';

@Injectable({
  providedIn: 'root'
})
export class PaymentTypeService {

  pts = new BehaviorSubject<any>(null);
  myMobilePayments = new BehaviorSubject<any>(null);


  constructor(private http: HttpClient, private authService: AuthService) {
  }

  public create(pt: PaymentType) {
    console.log('Save : ');
    console.log(pt);
    this.http.post(
      'http://127.0.0.1:8000/paymentType/create ', pt, this.authService.getHeader()
    ).subscribe((res: Response) => {
      console.log(res);
    });
  }

  public update(pt: PaymentType) {
    console.log('Update : ');
    console.log(pt);
    this.http.post(
      'http://127.0.0.1:8000/paymentType/update ', pt, this.authService.getHeader()
    ).subscribe((res: Response) => {
      console.log(res);
    });
  }

  public delete(id: string) {
    this.http.post(
      'http://127.0.0.1:8000/paymentType/delete ', {'id': id}, this.authService.getHeader()
    ).subscribe((res: Response) => {
      console.log(res);
    });
  }

  public getTotalCount() {
    return this.http.post(
      'http://127.0.0.1:8000/paymentType/countPaymentType ', [], this.authService.getHeader()
    );
    // .subscribe((res: Response) => {
    //   console.log(res);
    //   // return res;
    //   // return res["status"];
    // });
  }


  public getTotalMobilePaymentCount() {
    return this.http.post(
      'http://127.0.0.1:8000/payment/mobile/countPaymentMobile ', [], this.authService.getHeader()
    );
    // .subscribe((res: Response) => {
    //   console.log(res);
    //   // return res;
    //   // return res["status"];
    // });
  }

  /**
   *
   * @param perPage
   * @param pageNumber
   * @param sort_on
   * @param sort_by
   * @description all payments types.
   */
  public getAllPayments(perPage: number, pageNumber: number, sort_on: string, sort_by: string) {
    //pt = paymentType
    console.log('sort on : ' + sort_on);
    console.log('sort bys: ' + sort_by);

    this.pts = new BehaviorSubject<any>(null);

    return this.http.post<PaymentType>(
      'http://127.0.0.1:8000/paymentType/getAllPaymentType?page=' + pageNumber,
      {
        'per_page': perPage,
        'sort_by': sort_by,
        'sort_on': sort_on
      },
      this.authService.getHeader(),
    ).subscribe((pt: PaymentType) => {
      // console.log("One Job : " + pt["0"]["organization_name"]);
      console.log(pt);
      this.pts.next(pt);
    });

  }

  /**
   * @description all mobile payments for approval.
   * @param perPage
   * @param pageNumber
   * @param order
   * @param sort_on
   */
  public getAllMobilePayment(perPage: number, pageNumber: number, sort_on: string, sort_by: string) {
    //for approve
    this.myMobilePayments = new BehaviorSubject<any>(null);
    //for approve
    return this.http.post<PaymentMobile>(
      'http://127.0.0.1:8000/payment/mobile/getAllPaymentMobile?page=' + pageNumber,
      {
        'per_page': perPage,
        'sort_by': sort_by,
        'sort_on': sort_on
      },
      this.authService.getHeader(),
    ).subscribe((ptm: PaymentMobile) => {
      // console.log("One Job : " + pt["0"]["organization_name"]);
      console.log(ptm);
      this.myMobilePayments.next(ptm);
    });

  }

  public approve_mobile_payment(id: string) {
    return this.http.post<any>(
      'http://127.0.0.1:8000/payment/mobile/approve_mobile_payment',
      {
        'id': id
      },
      this.authService.getHeader(),
    );
    //     .subscribe((ptm: any) => {
    //   // console.log("One Job : " + pt["0"]["organization_name"]);
    //   // console.log(ptm);
    //   // this.myMobilePayments.next(ptm);
    // });
  }

  public searchMobilePayment(perPage_approv: number, pageNumber_approv: number, sort_on_approv: string, sort_by_approv: string, column_name: string, key: string) {
//     //for approve
    this.myMobilePayments = new BehaviorSubject<any>(null);
//     //for approve
    return this.http.post<PaymentMobile>(
      'http://127.0.0.1:8000/payment/mobile/search?page=' + pageNumber_approv,
      {
        'per_page': perPage_approv,
        'sort_by': sort_by_approv,
        'sort_on': sort_on_approv,
        'column_name': column_name,
        'key': key,
      },
      this.authService.getHeader(),
    ).subscribe((ptm: PaymentMobile) => {
      // console.log("One Job : " + pt["0"]["organization_name"]);
      console.log(ptm);
      this.myMobilePayments.next(ptm);
    });
  } // searchMobilePayment

  public getTotalCount_search(perPage_approv: number, pageNumber_approv: number, sort_on_approv: string, sort_by_approv: string, column_name: string, key: string) {
    return this.http.post(
      'http://127.0.0.1:8000/payment/mobile/search_count',
      {
        'per_page': perPage_approv,
        'sort_by': sort_by_approv,
        'sort_on': sort_on_approv,
        'column_name': column_name,
        'key': key,
      }, this.authService.getHeader()
    );
    // .subscribe((res: Response) => {
    //   console.log();
    //   console.log(res);
    //   // return res;
    //   // return res["status"];
    // });
  }


}//
