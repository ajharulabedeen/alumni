import { Component, OnInit } from '@angular/core';
import { PaymentType } from './payment-type.model';
import { debounce } from '../../../assets/bower_components/fullcalendar/dist/fullcalendar';
import { PaymentTypeService } from './payment-type.service';

@Component({
  selector: 'app-payment-type',
  templateUrl: './payment-type.component.html',
  styleUrls: ['./payment-type.component.scss']
})
export class PaymentTypeComponent implements OnInit {

  name: string;
  start_date: string;
  last_date: string;
  amount: string;
  description: string;

  constructor(private ptService: PaymentTypeService) { }

  ngOnInit() {
    // this.start_date = "2019/01/12";
    // this.start_date = "19/01/2019";
    document.body.className = 'hold-transition skin-blue sidebar-mini';
  }

  public create() {
    this.ptService.create(this.getPaymentType());
    // this.clearAllFields();
  }

  public getPaymentType(): PaymentType {
    var pt = new PaymentType();
    pt.$name = this.name;
    pt.$start_date = this.start_date;
    pt.$last_date = this.last_date;
    pt.$amount = this.amount;
    pt.$description = this.description;
    return pt;
  }

  public clearAllFields() {
    this.name = "";
    this.start_date = "";
    this.last_date = "";
    this.amount = "";
    this.description = "";

  }

}//class
