import { Component, OnInit } from '@angular/core';
import { PaymentType } from './payment-type.model';
import { PaymentTypeService } from './payment-type.service';
import { PaymentMobile } from '../payment-mobile/payment-mobile.model';
import { Serializer } from '@angular/compiler';
declare var jQuery: any;
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
  paymentsForApporv = new Array();

  perPage: number;
  idUpdate: string;
  updatePaymentType = false;
  ptForUpdate: PaymentType;
  pageNumber: number;
  total: number;
  totalPage: number;
  sort_on: string;//column name, on which sorting will be done.
  sort_by: string;//means the order.

  sort_on_approv: string;
  perPage_approv: number;
  total_approv: number;
  totalPage_approv: number;
  pageNumber_approv: number;
  sort_by_approv: string;

  totalMobilePayment: number;

  trxid_search: string;
  mobile_number_search: string;
  payment_date_search: string;
  last_date_search: string;
  value_search: string;


  active_search: boolean;

  constructor(private ptService: PaymentTypeService) { }

  ngOnInit() {
    // start : test
    // this.start_date_search = "01/01/2020";
    // this.last_date_search = "01/01/2020";
    this.sort_by_approv = "ASC";
    // end : test
    document.body.className = 'hold-transition skin-blue sidebar-mini';
    this.perPage = 10;
    this.pageNumber = 1;
    this.totalPage = (this.total / this.perPage);
    this.setTotalPaymentType();
    this.setTotalPaymentMobile();
    this.setExistingPayments();
    this.sort_on_approv = 'id';

    this.perPage_approv = 10;
    this.pageNumber_approv = 1;
    this.totalPage_approv = (this.total_approv / this.perPage_approv);

    //start : test code
    (function ($) {
      $(document).ready(function () {
        console.log("\n\nHello from jQuery!\n\n");
      });
    })(jQuery);
    // this.hello();
    //end : test code



  }//onInit

  public hello() {
    alert('Hello!!!');
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

  public setTotalPaymentMobile() {
    this.ptService.getTotalMobilePaymentCount().subscribe(res => {
      this.totalMobilePayment = res["status"];
    });
  }


  public setTotalPaymentType() {
    this.ptService.getTotalCount().subscribe(res => {
      this.total = res["status"];
    });
  }

  public delete(id: string) {
    this.ptService.delete(id);
    this.setExistingPayments();
    this.setTotalPaymentType();
  }


  public refreshTable_Approval() {

    // console.log("Load Payment mobile for approval!");
    console.log("Sort On : " + this.sort_on_approv);

    this.refreshTable_mobilePaymentApproval();

  }//all mobile payments for approval.

  /**
   * refreshing myPayments moibile Table, means so far payments user has done :
   */
  public refreshTable_mobilePaymentApproval() {
    this.paymentsForApporv = [];
    this.ptService.getAllMobilePayment(this.perPage_approv, this.pageNumber_approv, this.sort_on_approv, this.sort_by_approv);
    this.ptService.myMobilePayments.subscribe(ptm => {
      this.paymentsForApporv = [];
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
        this.paymentsForApporv.push(myPtm);
      }//for
      // console.log(this.myPaymentsArray);

    });
    // console.log(this.myPaymentsArray);
  }//all  mobile payments for approval.

  /**
   * @description this will change the color of the button, based on the status.
   * @param status
   */
  public changeColor(status: string) {
    var color;
    if (status == "1") {
      color = 'lime';
    } else if (status == "0") {
      color = 'red';
    } else {
      color = 'pink';
    }

    // console.log("color : " + color);
    let styles = {
      'background-color': color,
    };
    return styles;
  }

  public refreshTable() {
    this.setExistingPayments();
  }

  public setExistingPayments() {
    switch (this.sort_on) {
      case "ID":
        this.sort_on = "id";
        break;
      case "Name":
        this.sort_on = "name";
        break;
      case "Start Date":
        this.sort_on = "start_date";
        break;
      case "End Date":
        this.sort_on = "last_date";
        break;
      case "Amount":
        this.sort_on = "amount";
        break;
      default:
        break;
    }

    this.ptsArray = new Array();
    this.ptService.getAllPayments(this.perPage, this.pageNumber, this.sort_on, this.sort_by);
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

  public create() {
    if (this.updatePaymentType) {
      this.ptForUpdate = this.getPaymentType();
      this.ptForUpdate.$id = this.idUpdate;
      this.ptService.update(this.ptForUpdate);
      this.idUpdate = null;
      this.updatePaymentType = false;
    } else {
      this.ptService.create(this.getPaymentType());
    }
    // this.clearAllFields();
    this.refreshTable();

  }

  public search_approv() {
    console.log("Start Date : " + this.payment_date_search);
    console.log("Last Date : " + this.last_date_search);
    console.log("Mobile Number : " + this.mobile_number_search);
    console.log("TrxID : " + this.trxid_search);

  }

  public update(pt: PaymentType) {

    this.openCity(event, 'new_payment');

    this.updatePaymentType = true;
    // this.addNew = false;
    console.log("PT Name : " + pt.$name);
    this.setPTForUpdate(pt);
    this.idUpdate = pt.$id;
  }

  public previousPage() {
    if (this.pageNumber > 1) {
      this.pageNumber -= 1;
      this.refreshTable();
    }
  }

  public nextPage() {
    if (this.pageNumber < (this.total / this.perPage)) {
      this.pageNumber += 1;
      this.refreshTable();
    }
  }

  public setPTForUpdate(pt: PaymentType) {
    this.name = pt.$name;
    this.start_date = pt.$start_date;
    this.last_date = pt.$last_date;
    this.amount = pt.$amount;
    this.description = pt.$description;

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

  public toggle_active_search() {
    this.active_search = !this.active_search;
    console.log("ActiveSearch : " + this.active_search);
  }

}//clas
