import { Injectable } from '@angular/core';
import { PaymentType } from './payment-type.model';

@Injectable({
  providedIn: 'root'
})
export class PaymentTypeService {

  constructor() { }

  public create(pt : PaymentType){
    console.log(pt);
  }


}//
