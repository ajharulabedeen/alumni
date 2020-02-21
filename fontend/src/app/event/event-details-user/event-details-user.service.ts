import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {AuthService} from '../../auth/auth.service';
import {PaymentMobile} from '../../payment/payment-mobile/payment-mobile.model';

@Injectable({
  providedIn: 'root'
})
export class EventDetailsUserService {

  constructor(private http: HttpClient,
              private authService: AuthService) {
  }


  public register_to_event(id: string) {
    return this.http.post(
      'http://127.0.0.1:8000/events/eventRegistration',
      {
        'event_id': id,
      },
      this.authService.getHeader()
    );
  }

  checkRegister(id: string) {
    console.log('eID  :' + id);
    return this.http.post(
      'http://127.0.0.1:8000/events/checkEventRegistration',
      {
        'event_id': id,
      },
      this.authService.getHeader()
    );
  }

  checkPayment(id: string) {
    console.log('checkPayment eID  :' + id);
    return this.http.post(
      'http://127.0.0.1:8000/events/checkPayment',
      {
        'event_id': id,
      },
      this.authService.getHeader()
    );
  }

  public savePaymetMobile(mobilePayment: PaymentMobile) {
    console.log(mobilePayment);
    return this.http.post(
      'http://127.0.0.1:8000/api/payment/mobile/create', mobilePayment, this.authService.getHeader()
    );
    //   .subscribe((res: Response) => {
    //   console.log(res);
    // });

  }
}// class
