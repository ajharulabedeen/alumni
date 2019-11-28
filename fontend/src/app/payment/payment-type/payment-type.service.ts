import { Injectable } from '@angular/core';
import { PaymentType } from './payment-type.model';
import { AuthService } from '../../auth/auth.service';
import { HttpClient } from '@angular/common/http';
@Injectable({
  providedIn: 'root'
})
export class PaymentTypeService {

  constructor(private http : HttpClient, private authService : AuthService) { }

  public create(pt: PaymentType) {
    console.log(pt);
    this.http.post(
      'http://127.0.0.1:8000/paymentType/create ', pt, this.authService.getHeader()
    ).subscribe((res: Response) => {
      console.log(res);
    });
  }


}//
