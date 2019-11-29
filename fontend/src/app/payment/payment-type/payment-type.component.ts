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

  // ptsArray = new Array(PaymentType);
  ptsArray = new Array();

  perPage: string;

  constructor(private ptService: PaymentTypeService) { }

  ngOnInit() {
    // this.start_date = "2019/01/12";
    // this.start_date = "19/01/2019";
    document.body.className = 'hold-transition skin-blue sidebar-mini';
    this.perPage = "10";
    this.setExistingPayments();
  }

  public delete(id: string) {
    this.ptService.delete(id);
    this.setExistingPayments();
  }

  public refreshTable() {
    this.setExistingPayments();
  }

  public setExistingPayments() {
    this.ptsArray = new Array();
    this.ptService.getAllPayments(this.perPage);
    this.ptService.pts.subscribe(pt => {
      for (const key1 in pt) {
        console.log(key1);
        // console.log(pt[key1]['id']);
        var pt1 = new PaymentType();
        pt1.$id = pt[key1]["id"];
        pt1.$name = pt[key1]["name"];
        pt1.$start_date = pt[key1]["start_date"];
        pt1.$last_date = pt[key1]["last_date"];
        pt1.$description = pt[key1]["description"];
        pt1.$amount = pt[key1]["amount"];
        this.ptsArray.push(pt1);
      }
    });
  }//method

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
