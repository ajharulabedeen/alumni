import {Component, OnInit} from '@angular/core';
import {ActivatedRoute} from '@angular/router';
import {Basic} from '../../profile/basic/basic.model';
import {EventDetailsService} from './event-details.service';
import {Events} from '../event-manage/events.model';
import {RegisteredUser} from './registered-user.model';
import {PaymentMobile} from '../../payment/payment-mobile/payment-mobile.model';
import {PaymentMobileService} from '../../payment/payment-mobile/payment-mobile.service';
import {PaymentTypeService} from '../../payment/payment-type/payment-type.service';

@Component({
  selector: 'app-event-details',
  templateUrl: './event-details.component.html',
  styleUrls: ['./event-details.component.scss']
})
export class EventDetailsComponent implements OnInit {

  id: string;

  basic_search_by: string;
  basic_value_search: string;
  basicSearch_pageNumber: number;
  basicSearch_sort_by: string;
  basicSearch_sort_on: string;

  basicSearch_perPage: number;
  basicSearch_total: number;

  registered_user = new Array();

  event = new Events();
  registered_user = new Array();
  addNote: boolean;
  active_search: boolean;

  approved: boolean;
  mobilePayment: PaymentMobile;
  paymentFound: boolean;
  payment_id_approval: string;

  constructor(private activeRoute: ActivatedRoute,
              private eventDeatailsService: EventDetailsService,
              private ptService: PaymentTypeService) {
  }

  ngOnInit() {

    this.basic_search_by = 'student_id';
    this.basicSearch_sort_on = 'dept';
    this.basicSearch_perPage = 10;
    this.basicSearch_sort_by = 'ASC';
    this.basicSearch_pageNumber = 1;
    this.basic_value_search = '';

    this.id = this.activeRoute.snapshot.params['id'];
    document.body.className = 'hold-transition skin-blue sidebar-mini';
    console.log(' ID : ' + this.id);

    this.eventDeatailsService.getEvent(this.id).subscribe((e: Events) => {
      // console.log("One Job : " + pt["0"]["organization_name"]);
      console.log(e);
      // console.log(e[0]);
      // refactor : have to fix the back end Code.
      // e = e[0];
      this.event.$id = e['id'];
      this.event.$title = e['title'];
      this.event.$start_date = e['start_date'];
      this.event.$end_date = e['end_date'];
      this.event.$location = e['location'];
      this.event.$fee = e['fee'];
      this.event.$description = e['description'];
      this.event.$notes = e['notes'];
    });

  }// init

  printId() {
    console.log(' ID : ' + this.id);
  }


  public refreshTable_basicSearch(): void {
    console.log('refreshTable_basicSearch :');
    // tslint:disable-next-line:max-line-length
    // this.setBasicSearchCount();
    this.eventDeatailsService.basicSearch(this.basicSearch_perPage, this.basicSearch_pageNumber, this.basicSearch_sort_on, this.basicSearch_sort_by, this.basic_search_by, this.basic_value_search);
    this.eventDeatailsService.basic.subscribe(b => {
      this.registered_user = [];
      for (const key in b) {
        // console.log(b);
        var basic = new Basic();
        basic.$user_id = b[key]['user_id'];
        basic.$dept = b[key]['dept'];
        basic.$batch = b[key]['batch'];
        basic.$student_id = b[key]['student_id'];
        basic.$passing_year = b[key]['passing_year'];
        basic.$first_name = b[key]['first_name'];
        basic.$last_name = b[key]['last_name'];
        basic.$birth_date = b[key]['birth_date'];
        basic.$gender = b[key]['gender'];
        basic.$blood_group = b[key]['blood_group'];
        basic.$email = b[key]['email'];
        basic.$phone = b[key]['phone'];
        basic.$address_present = b[key]['address_present'];
        basic.$address_permanent = b[key]['address_permanent'];
        basic.$research_interest = b[key]['research_interest'];
        basic.$skills = b[key]['skills'];
        basic.$image_address = b[key]['image_address'];
        basic.$religion = b[key]['religion'];
        basic.$social_media_link = b[key]['social_media_link'];
        this.registered_user.push(basic);
      }// for
    });
    // console.log(this.registered_user);
  }// refreshTable_basicSearch
  public basicSearch_previousPage() {
    console.log('basicSearch_previousPage');
    if (this.basicSearch_pageNumber > 1) {
      this.basicSearch_pageNumber -= 1;
      this.refreshTable_basicSearch();
    }
  }

  public basicSearch_nextPage() {
    console.log('basicSearch_nextPage');
    if (this.basicSearch_pageNumber < (this.basicSearch_total / this.basicSearch_perPage)) {
      this.basicSearch_pageNumber += 1;
      this.refreshTable_basicSearch();
    }
  }

  public setBasicSearchCount() {
    // this.basicSearch_pageNumber = 1;
    // this.eventDeatailsService.getBsicSearchCount(
    //   this.basicSearch_perPage,
    //   this.basicSearch_pageNumber,
    //   this.basicSearch_sort_on,
    //   this.basicSearch_sort_by,
    //   this.basic_search_by,
    //   this.basic_value_search)
    //   .subscribe(res => {
    //     this.basicSearch_total = res['status'];
    //   });
    // this.refreshTable_basicSearch();
    this.refreshTable();
  }

  public refreshTable() {
    console.log(this.basicSearch_perPage,
      this.basicSearch_sort_by,// ASC-DESC
      this.basicSearch_sort_on,
      this.basic_search_by,
      // this.basic_value_search,
      this.basic_value_search,
      this.event.$id);

    if (!this.active_search) {
      this.basic_value_search = '';
    }
    this.countSearchRegisteredUser();
    this.eventDeatailsService.getRegisteredUser(
      this.basicSearch_perPage,
      this.basicSearch_sort_by, // ASC-DESC
      this.basicSearch_sort_on,
      this.basic_search_by,
      this.basic_value_search,
      this.event.$id
    ).subscribe(res => {
      console.log(res['data']);
      // console.log(res['data'][0]);
      this.registered_user = new Array();
      var usersRegistered = res['data'];
      for (const key in usersRegistered) {
        var basic = new RegisteredUser();
        basic = usersRegistered[key];
        this.registered_user.push(basic);
      }// for
      // console.log("-----------------");
      // console.log(this.registered_user);
    });
  }

  public countSearchRegisteredUser() {
    var column_name = this.basic_search_by;
    var key = this.basic_value_search;
    if (!this.active_search) {
      this.basic_value_search = '';
    }

    this.eventDeatailsService.countSearchRegisteredUser(column_name, key, this.event.$id).subscribe(res => {
      console.log(res);
      this.basicSearch_total = res['count'];
    });
  }


  showPaymentDetails(payment_mobile_id: string, payment_status: string) {
    console.log('payment_id : ' + payment_mobile_id);
    this.approved = false;
    this.paymentFound = false;
    this.payment_id_approval = payment_mobile_id;
    if (payment_status == '1') {
      this.approved = true;
    }
    this.mobilePayment = new PaymentMobile();
    this.eventDeatailsService.getOneMobilePayment(payment_mobile_id).subscribe(res => {
      console.log(res['date']);
      if (res == null) {
        this.paymentFound = false;
      } else {
        this.paymentFound = true;
        this.mobilePayment = res;
        this.mobilePayment.$id = res['id'];
        this.mobilePayment.$user_id = res['user_id'];
        this.mobilePayment.$amount = res['amount'];
        this.mobilePayment.$type_ID = res['type_ID'];
        this.mobilePayment.$event_id = res['event_id'];
        this.mobilePayment.$date = res['date'];
        this.mobilePayment.$payment_method = res['payment_method'];
        this.mobilePayment.$mobile_number = res['mobile_number'];
        this.mobilePayment.$trx_id = res['trx_id'];
        this.mobilePayment.$status = res['status'];
        this.mobilePayment.$notes = res['notes'];
        this.mobilePayment.$approved_date = res['approved_date'];
        this.mobilePayment.$approved_date = res['approved_by'];
        this.mobilePayment.$trx_id = res['trx_id'];
        // console.log(this.mobilePayment);
        // console.log(this.mobilePayment.$trx_id);
      }
    });
  }

  public approve_payment() {
    var local: string;
    this.payment_id_approval;
    console.log('this.payment_id_approval : ' + this.payment_id_approval);
    this.ptService.approve_mobile_payment(this.payment_id_approval).subscribe((data: any) => {
      local = data['status'];
      // //refactor
      if (local == 'ok') {
        this.refreshTable();
      }
    });
  }
}// class
