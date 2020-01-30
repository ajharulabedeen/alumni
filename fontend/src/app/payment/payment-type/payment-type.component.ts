import {Component, OnInit} from '@angular/core';
import {PaymentType} from './payment-type.model';
import {PaymentTypeService} from './payment-type.service';
import {PaymentMobile} from '../payment-mobile/payment-mobile.model';
import {Serializer} from '@angular/compiler';
import {PaymentMobileService} from '../payment-mobile/payment-mobile.service';
import {subscribeTo} from 'rxjs/internal-compatibility';

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
  search_by: string;

  payment_note: string;
  noteEdit: boolean;
  payment_id_approval: string;
  active_search: boolean;

  constructor(private ptService: PaymentTypeService, private ptmService: PaymentMobileService) {
  }

  ngOnInit() {
    // start : test
    // this.start_date_search = "01/01/2020";
    // this.last_date_search = "01/01/2020";
    this.sort_by_approv = 'ASC';
    this.search_by = 'mobile_number';
    this.value_search = '01';
    // end : test
    document.body.className = 'hold-transition skin-blue sidebar-mini';
    this.total_count = 0;
    this.perPage = 10;
    this.perPage_approv = 10;
    this.pageNumber = 1;
    this.pageNumber_approv = 1;
    this.totalPage = (this.total / this.perPage);
    this.totalPage_approv = (this.totalMobilePayment / this.perPage_approv);
    this.setTotalPaymentType();
    this.setTotalPaymentMobile();
    this.setExistingPayments();
    this.sort_on_approv = 'id';

    //refactor
    this.perPage_approv = 10;
    this.pageNumber_approv = 1;
    this.totalPage_approv = (this.totalMobilePayment / this.perPage_approv);

    //start : test code
    (function($) {
      $(document).ready(function() {
        console.log('\n\nHello from jQuery!\n\n');
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
    tabcontent = document.getElementsByClassName('tabcontent');
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = 'none';
    }
    tablinks = document.getElementsByClassName('tablinks');
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(' active', '');
    }
    document.getElementById(tabName).style.display = 'block';
    evt.currentTarget.className += ' active';
  }

  public setTotalPaymentMobile() {
    this.ptService.getTotalMobilePaymentCount().subscribe(res => {
      this.total_count = res['status'];
      this.totalMobilePayment = this.total_count;
    });
  }


  public setTotalPaymentType() {
    this.ptService.getTotalCount().subscribe(res => {
      this.total = res['status'];
    });
  }

  public delete(id: string) {
    this.ptService.delete(id);
    this.setExistingPayments();
    this.setTotalPaymentType();
  }


  /**
   * @description this will change the color of the button, based on the status.
   * @param status
   */
  public changeColor(status: string) {
    var color;
    if (status == '1') {
      color = 'lime';
    } else if (status == '0') {
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
      case 'ID':
        this.sort_on = 'id';
        break;
      case 'Name':
        this.sort_on = 'name';
        break;
      case 'Start Date':
        this.sort_on = 'start_date';
        break;
      case 'End Date':
        this.sort_on = 'last_date';
        break;
      case 'Amount':
        this.sort_on = 'amount';
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
        pt1.$id = pt[key1]['id'];
        pt1.$name = pt[key1]['name'];
        pt1.$start_date = pt[key1]['start_date'];
        pt1.$last_date = pt[key1]['last_date'];
        pt1.$description = pt[key1]['description'];
        pt1.$amount = pt[key1]['amount'];
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


  public update(pt: PaymentType) {

    this.openCity(event, 'new_payment');

    this.updatePaymentType = true;
    // this.addNew = false;
    console.log('PT Name : ' + pt.$name);
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
    this.name = '';
    this.start_date = '';
    this.last_date = '';
    this.amount = '';
    this.description = '';

  }

  public toggle_active_search() {
    this.active_search = !this.active_search;
    console.log('ActiveSearch : ' + this.active_search);
  }

  //------------------------ start : payment-approval
  //------------------------ start : payment-approval
  //------------------------ start : payment-approval
  //------------------------ start : payment-approval
  onePaymentType = new PaymentType();
  //it will be used for all.
  total_count: number;

  public approve_payment() {
    var local: string;
    this.payment_id_approval;
    console.log('this.payment_id_approval : ' + this.payment_id_approval);
    this.ptService.approve_mobile_payment(this.payment_id_approval).subscribe((data: any) => {
      local = data['status'];
      //refactor
      if (local == 'ok') {
        this.refreshTable_Approval();
      }
    });

  }

  approved_by_name: string;
  approved_by_number: string;

  public search_approv() {
    this.paymentsForApporv = [];
    this.ptService.searchMobilePayment(this.perPage_approv, this.pageNumber_approv, this.sort_on_approv, this.sort_by_approv, this.search_by, this.value_search);
    this.setSearchCcount();
    this.setSearchCcount();
    this.ptService.myMobilePayments.subscribe(ptm => {
      this.paymentsForApporv = [];
      for (const key1 in ptm) {
        // console.log(key1);
        // console.log(pt[key1]['id']);
        var myPtm = new PaymentMobile();
        // pt1.$id = pt[key1]["id"];
        // myPtm.$name = ptm[key1]["name"];

        myPtm.$id = ptm[key1]['id'];
        myPtm.$user_id = ptm[key1]['user_id'];
        myPtm.$amount = ptm[key1]['amount'];
        myPtm.$type_ID = ptm[key1]['type_ID'];
        myPtm.$date = ptm[key1]['date'];
        myPtm.$payment_method = ptm[key1]['payment_method'];
        myPtm.$mobile_number = ptm[key1]['mobile_number'];
        myPtm.$trx_id = ptm[key1]['trx_id'];
        myPtm.$status = ptm[key1]['status'];
        myPtm.$created_at = ptm[key1]['created_at'];
        myPtm.$notes = ptm[key1]['notes'];
        myPtm.$approved_date = ptm[key1]['approved_date'];
        this.paymentsForApporv.push(myPtm);
      }//for
      // console.log(this.myPaymentsArray);

    });
    // console.log(this.myPaymentsArray);


  }

  //refactor : same method twice.
  public showPaymentDetails(type_ID: string) {
    console.log(type_ID);
    // console.log("Before : " + this.ptmService.onePaymentType);
    this.ptmService.getOnePayementType(type_ID);
    console.log('After : ' + this.ptmService.onePaymentType.subscribe());
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
    console.log('onePaymentType : ' + this.onePaymentType.$description);
  }

  //may be not needed.
  public showNote(note: string) {
    this.payment_note = note;
    console.log(this.payment_note);
  }

  public refreshTable_Approval() {
    // console.log("Load Payment mobile for approval!");
    console.log('Sort On : ' + this.sort_on_approv);
    this.refreshTable_mobilePaymentApproval();
  }//all mobile payments for approval.

  /**
   * refreshing myPayments moibile Table, means so far payments user has done :
   */
  public refreshTable_mobilePaymentApproval() {
    //refactor : to update table data, required to call the service code each side.
    this.paymentsForApporv = [];
    if (this.active_search) {
      // this.ptService.getTotalCount_search(this.perPage_approv, this.pageNumber_approv, this.sort_on_approv, this.sort_by_approv, this.search_by, this.value_search);
      this.setSearchCcount();
      this.ptService.searchMobilePayment(this.perPage_approv, this.pageNumber_approv, this.sort_on_approv, this.sort_by_approv, this.search_by, this.value_search);
    } else {
      // this.total_count
      this.setTotalPaymentMobile();
      this.ptService.getAllMobilePayment(this.perPage_approv, this.pageNumber_approv, this.sort_on_approv, this.sort_by_approv);
    }


    this.ptService.myMobilePayments.subscribe(ptm => {
      this.paymentsForApporv = [];
      for (const key1 in ptm) {
        // console.log(key1);
        // console.log(pt[key1]['id']);
        var myPtm = new PaymentMobile();
        // pt1.$id = pt[key1]["id"];
        // myPtm.$name = ptm[key1]["name"];

        myPtm.$id = ptm[key1]['id'];
        myPtm.$user_id = ptm[key1]['user_id'];
        myPtm.$amount = ptm[key1]['amount'];
        myPtm.$type_ID = ptm[key1]['type_ID'];
        myPtm.$date = ptm[key1]['date'];
        myPtm.$payment_method = ptm[key1]['payment_method'];
        myPtm.$mobile_number = ptm[key1]['mobile_number'];
        myPtm.$trx_id = ptm[key1]['trx_id'];
        myPtm.$status = ptm[key1]['status'];
        myPtm.$created_at = ptm[key1]['created_at'];
        myPtm.$notes = ptm[key1]['notes'];
        myPtm.$approved_date = ptm[key1]['approved_date'];
        this.paymentsForApporv.push(myPtm);
      }//for
      // console.log(this.myPaymentsArray);

    });
    // console.log(this.myPaymentsArray);
  }//all  mobile payments for approval.

  public nextPage_approval() {
    console.log('Next Page Approval : ');
    console.log('Total Page : ' + this.totalMobilePayment);
    if (this.pageNumber_approv < (this.total_count / this.perPage_approv)) {
      this.pageNumber_approv += 1;
      this.refreshTable_Approval();
    }
  }

  public previousPage_approval() {
    console.log('Previous Page Approval : ');
    if (this.pageNumber_approv > 1) {
      this.pageNumber_approv -= 1;
      this.refreshTable_Approval();
    }
  }

  /**
   * @description setting the total number of search found.
   */
  public setSearchCcount() {
    this.ptService.getTotalCount_search(this.perPage_approv, this.pageNumber_approv, this.sort_on_approv, this.sort_by_approv, this.search_by, this.value_search)
      .subscribe(res => {
        console.log(res);
        this.total_count = res['status'];
      });
  }

  //-------------------------------- end : payment-approval
  //================================ end : payment-approval
  //-------------------------------- end : payment-approval
  //================================ end : payment-approval


}//clas
