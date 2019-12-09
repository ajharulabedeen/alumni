import { Component, OnInit } from '@angular/core';
import { PaymentTypeService } from '../payment-type/payment-type.service';
import { PaymentType } from '../payment-type/payment-type.model';

@Component({
  selector: 'app-payment-mobile',
  templateUrl: './payment-mobile.component.html',
  styleUrls: ['./payment-mobile.component.scss']
})
export class PaymentMobileComponent implements OnInit {

  paymentType_id: string;
  amount: string;
  date: string;
  paymentMethod: string;
  trxID: string;

  mymodel: string;

  perPage: number;
  idUpdate: string;
  updatePaymentType = false;
  pageNumber: number;
  total: number;
  totalPage: number




  ptsArray = new Array();

  constructor(private ptService: PaymentTypeService) { }

  ngOnInit() {
    document.body.className = 'hold-transition skin-blue sidebar-mini';
    this.totalPage = (this.total / this.perPage);
    this.pageNumber=1;
    this.perPage = 10;
    this.setTotalPaymentType();
    this.setExistingPayments();
  }

  // start : Test
  valuechange(newValue) {
    this.mymodel = newValue;
    console.log(newValue)
  }

  onSearchChange(searchValue: string): void {
    console.log(searchValue);
  }
  // end : Test



  public setExistingPayments() {
    this.ptsArray = [];
    // this.ptsArray = new Array();
    this.ptService.getAllPayments(this.perPage, this.pageNumber);
    this.ptService.pts.subscribe(pt => {
      this.ptsArray = [];
      for (const key1 in pt) {
        // console.log(key1);
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
    this.setTotalPaymentType();
  }//method


  /**
   * start of the component all the data will be set.
   */
  public setTotalPaymentType() {
    this.ptsArray = [];
    this.ptService.getTotalCount().subscribe(res => {
      this.total = res["status"];
    });
  }

  public refreshTable() {
    this.ptsArray = [];
    this.setExistingPayments();
  }


  public nextPage() {
    if (this.pageNumber < (this.total / this.perPage)) {
      this.pageNumber += 1;
      this.refreshTable();
    }
  }

  public previousPage() {
    if (this.pageNumber > 1) {
      this.pageNumber -= 1;
      this.refreshTable();
    }
  }



}//class
