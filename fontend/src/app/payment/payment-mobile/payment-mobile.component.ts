import { Component, OnInit } from '@angular/core';
import { PaymentTypeService } from '../payment-type/payment-type.service';
import { PaymentType } from '../payment-type/payment-type.model';
import { PaymentMobile } from './payment-mobile.model';
import { PaymentMobileService } from './payment-mobile.service';

@Component({
  selector: 'app-payment-mobile',
  templateUrl: './payment-mobile.component.html',
  styleUrls: ['./payment-mobile.component.scss']
})
export class PaymentMobileComponent implements OnInit {

  amount: string;
  type_ID: string;
  date: string;
  payment_method: string;
  mobile_number: string;
  trx_id: string;


  mymodel: string;

  perPage: number;
  idUpdate: string;
  updatePaymentType = false;
  pageNumber: number;
  total: number;
  totalPage: number

  onePaymentType = new PaymentType();


  ptsArray = new Array();
  myPaymentsArray = new Array();
  showNote: string;

  constructor(private ptService: PaymentTypeService, private ptmService: PaymentMobileService) { }

  ngOnInit() {
    document.body.className = 'hold-transition skin-blue sidebar-mini';
    this.totalPage = (this.total / this.perPage);
    this.pageNumber = 1;
    this.perPage = 10;
    this.setTotalPaymentType();
    this.setExistingPayments();
  }

  public openCity(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
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


  public savePayment() {
    console.log("Save Payment!");
    var mobilePayment = new PaymentMobile();
    mobilePayment.$type_ID = this.type_ID;
    mobilePayment.$amount = this.amount;
    mobilePayment.$date = this.date;
    mobilePayment.$payment_method = this.payment_method;
    mobilePayment.$trx_id = this.trx_id;
    mobilePayment.$mobile_number = this.mobile_number;
    this.ptmService.savePaymetMobile(mobilePayment);

  }//savePayment

  public setPaymentTypeID(id: string, amount: string) {
    //payment Type
    this.type_ID = id;
    this.amount = amount;
    this.date = this.getTodayDtae();
  }

  public setExistingPayments() {
    this.ptsArray = [];
    // this.ptsArray = new Array();
    //refactor : have to add param for the method.
    this.ptService.getAllPayments(this.perPage, this.pageNumber," "," ");
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

  /**
   * refreshing myPayments moibile Table, means so far payments user has done :
   */
  public refreshTable() {
    this.myPaymentsArray = [];
    this.ptmService.getAllMyPayments();
    this.ptmService.myMobilePayments.subscribe(ptm => {
      this.myPaymentsArray = [];
      for (const key1 in ptm) {
        // console.log(key1);
        // console.log(pt[key1]['id']);
        var myPtm = new PaymentMobile();
        // pt1.$id = pt[key1]["id"];
        // myPtm.$name = ptm[key1]["name"];

        myPtm.$user_id = ptm[key1]["user_id"];
        myPtm.$amount = ptm[key1]["amount"];
        myPtm.$type_ID = ptm[key1]["type_ID"];
        myPtm.$date = ptm[key1]["date"];
        myPtm.$payment_method = ptm[key1]["payment_method"];
        myPtm.$mobile_number = ptm[key1]["mobile_number"];
        myPtm.$trx_id = ptm[key1]["trx_id"];
        myPtm.$status = ptm[key1]["status"];
        myPtm.$created_at = ptm[key1]["created_at"];
        myPtm.$notes = ptm[key1]["notes"];
        myPtm.$approved_date = ptm[key1]["approved_date"];
        this.myPaymentsArray.push(myPtm);
      }
      // console.log(this.myPaymentsArray);

    });
    // console.log(this.myPaymentsArray);
  }//all my mobile payments.



  public showPaymentDetails(type_ID: string) {
    console.log(type_ID);
    // console.log("Before : " + this.ptmService.onePaymentType);
    this.ptmService.getOnePayementType(type_ID);
    console.log("After : " + this.ptmService.onePaymentType.subscribe());
    this.ptmService.onePaymentType.subscribe(pt => {

      for (const key1 in pt) {
        // console.log(key1);
        // console.log(pt[key1]);
        this.onePaymentType.$amount = pt[key1]['amount'];
        this.onePaymentType.$description = pt[key1]['description'];
        this.onePaymentType.$id = pt[key1]['id'];
        this.onePaymentType.$last_date = pt[key1]['last_date'];
        this.onePaymentType.$name = pt[key1]['name'];
        this.onePaymentType.$start_date = pt[key1]['start_date'];
      }
    });
    console.log("onePaymentType : " + this.onePaymentType.$description);
  }

  public setNote(note: string) {
    this.showNote = note;
    // console.log(this.showNote);
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

  public getTodayDtae() {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    var t = yyyy + '/' + mm + '/' + dd;
    return t;
  }


}//class
