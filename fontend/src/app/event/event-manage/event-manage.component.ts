import {Component, OnInit} from '@angular/core';
import {Events} from './events.model';
import {EventManageService} from './event-manage.service';
import {PaymentMobile} from '../../payment/payment-mobile/payment-mobile.model';
import {PaymentType} from '../../payment/payment-type/payment-type.model';
import {tryCatch} from 'rxjs/internal-compatibility';

// import {Events} from '/src/app/event/event-manage/';

@Component({
  selector: 'app-event-manage',
  templateUrl: './event-manage.component.html',
  styleUrls: ['./event-manage.component.scss']
})
export class EventManageComponent implements OnInit {

  name: string;
  start_date: string;
  last_date: string;
  cost: string;
  vanue: string;
  description: string;
  note: string;
  active_search: boolean;

  edit_id: string;
  edit_name: string;
  edit_start_date: string;
  edit_last_date: string;
  edit_cost: string;
  edit_vanue: string;

  event_search_by: string;
  event_value_search: string;
  eventSearch_perPage: number;
  eventSearch_total: number;
  eventSearch_pageNumber: number;
  eventSearch_sort_by: string;
  eventSearch_sort_on: string;

  event_array = new Array();

  deatilsDescription: string;
  deatilsNotes: string;
  deleteID: string;

  editDescriptionNotes: boolean;
  private editEventID: string;

  eventEdit: Events;
  payment: PaymentType;
  paymentFound: boolean;
  // for search
  paymentID: string;
  private assingSuccess: boolean;
  removeConfirmAsk: boolean;

  constructor(private eService: EventManageService) {
  }

  ngOnInit() {
    this.paymentFound = false;
    this.eventSearch_pageNumber = 1;
    this.eventSearch_perPage = 10;
    this.eventSearch_sort_by = 'ASC';
    this.event_search_by = 'title';
    this.eventSearch_sort_on = 'end_date';
    this.setTotal();
    this.editDescriptionNotes = true;

    window.dispatchEvent(new Event('resize'));
    document.body.className = 'hold-transition skin-blue sidebar-mini';
  }


  // start : for tab in font end.
  public searchTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName('tabcontent');
    // tabcontent[0].className = 'active';//not working
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = 'none';
    }
    tablinks = document.getElementsByClassName('tablinks');
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace('active', '');
    }
    document.getElementById(tabName).style.display = 'block';
    evt.currentTarget.className += ' active';
  }

  // end : for tab in font end.


  public eventSearch_previousPage() {
    if (this.eventSearch_pageNumber > 1) {
      this.eventSearch_pageNumber -= 1;
      this.refreshTable_eventSearch();
    }
  }

  public eventSearch_nextPage() {
    if (this.eventSearch_pageNumber < (this.eventSearch_total / this.eventSearch_perPage)) {
      this.eventSearch_pageNumber += 1;
      this.refreshTable_eventSearch();
    }
  }

  public setTotal() {
    if (this.active_search) {
      this.eService.count_search(this.event_search_by, this.event_value_search).subscribe(res => {
        // console.log(res);
        this.eventSearch_total = res['data'];
      });

    } else {
      this.eService.couunt_all().subscribe(res => {
        // console.log(res);
        this.eventSearch_total = res['data'];
      });
    }

    // this.eService.couunt_all();

  }

  public refreshTable_eventSearch() {

    this.event_array = [];

    if (this.active_search) {
      // console.log("\n Search Active!");
      this.setTotal();
      this.eService.eventSearch(
        this.eventSearch_perPage,
        this.eventSearch_sort_by,
        this.eventSearch_sort_on,
        this.eventSearch_pageNumber,
        this.event_search_by,
        this.event_value_search);

    } else {
      this.setTotal();
      this.eService.getAllEvents(
        this.eventSearch_perPage,
        this.eventSearch_sort_by,
        this.eventSearch_sort_on,
        this.eventSearch_pageNumber);
    }

    this.eService.events.subscribe(e => {
      this.event_array = [];
      for (const key1 in e) {
        //     // console.log(key1);
        //     // console.log(pt[key1]['id']);
        var event = new Events();
        event.$id = e[key1]['id'];
        event.$user_id = e[key1]['user_id'];
        event.$title = e[key1]['title'];
        event.$start_date = e[key1]['start_date'];
        event.$end_date = e[key1]['end_date'];
        event.$fee = e[key1]['fee'];
        event.$location = e[key1]['location'];
        this.event_array.push(event);
      }
    });
    // console.log(this.event_array);
  }

  public createEvent() {
    console.log('this.getEvent()');
    console.log(this.getEvent());
    this.eService.save(this.getEvent());
  }

  public getEvent(): Events {
    var event = new Events();
    event.$title = this.name;
    event.$description = this.description;
    event.$start_date = this.start_date;
    event.$end_date = this.last_date;
    event.$fee = this.cost;
    event.$location = this.vanue;
    event.$notes = this.note;
    return event;
  }

  public setDescriptionNotes(id: string) {
    // console.log('ID : ' + id);
    this.edit_id = id;
    this.editDescriptionNotes = false;
    this.eService.getDescriptionNotes(id).subscribe(data => {
      console.log('Data : ' + data);
      this.deatilsDescription = data['description'];
      this.deatilsNotes = data['notes'];
    });
  }

  public setDeleteID(id: string) {
    this.deleteID = id;
    console.log('this.deleteID ' + this.deleteID);
  }

  public delete() {
    // console.log('delete : ' + id);
    this.eService.delete(this.deleteID).subscribe(data => {
      console.log(data);
      if (data['status'] == '1') {
        this.refreshTable_eventSearch();
      }
    });
  }

  /**
   * basic event information will be set to the modal for update.
   */
  public setBasicEventInfo(eventBasic: Events) {
    // console.log(eventBasic);
    this.editEventID = eventBasic.$id;
    this.edit_name = eventBasic.$title;
    this.edit_start_date = eventBasic.$start_date;
    this.edit_last_date = eventBasic.$end_date;
    this.edit_cost = eventBasic.$fee;
    this.edit_vanue = eventBasic.$location;
  }

  public update_event_basic() {
    var eventEdit = new Events();
    eventEdit.$id = this.editEventID;
    eventEdit.$title = this.edit_name;
    eventEdit.$start_date = this.edit_start_date;
    eventEdit.$end_date = this.edit_last_date;
    eventEdit.$fee = this.edit_cost;
    eventEdit.$location = this.edit_vanue;
    this.eService.updateBasic(eventEdit).subscribe(data => {
      // console.log(data);
      if (data[0]['status'] == 'OK') {
        this.refreshTable_eventSearch();
      }
    });

  }

  public updateDescriptionNotes() {
    this.eService.updateDescriptionNotes(this.edit_id, this.deatilsDescription, this.deatilsNotes).subscribe(data => {
      // console.log(data);
      if (data[0]['status'] == 'OK') {
        // this.refreshTable_eventSearch();
        this.editDescriptionNotes = !this.editDescriptionNotes;
      }
    });
  }

  public searchPaymentType() {
    this.eService.searchPaymentType(this.paymentID).subscribe(p => {
      // console.log(p);
      try {
        for (const key1 in p) {
          //     // console.log(key1);
          //     // console.log(pt[key1]['id']);
          this.payment = new PaymentType();
          this.payment.$id = p[key1]['id'];
          this.payment.$name = p[key1]['name'];
          this.payment.$start_date = p[key1]['start_date'];
          this.payment.$last_date = p[key1]['last_date'];
          this.payment.$amount = p[key1]['amount'];
          this.payment.$description = p[key1]['description'];
          this.paymentFound = true;
        }
      } catch (e) {
        this.paymentFound = false;
      }

    });
  }

  public assingPayment(paymentID: string) {
    console.log('editEventID  : ' + this.editEventID);
    console.log('paymentID  : ' + paymentID);
    this.eService.assingPayment(paymentID, this.editEventID).subscribe(data => {
      console.log(data);
      if (data > 0) {
        this.assingSuccess = true;
      }
    });
  }

  public checkPaymentAssingment() {
    console.log(this.editEventID);
    this.eService.checkPaymentAssingment(this.editEventID).subscribe(data => {
      console.log(data);
      if (data > 0) {
        this.paymentID = data.toString();
        this.paymentFound = true;
        this.searchPaymentType();
      }
    });
  }

  public removePaymentFromEvent(paymentID: string) {
    console.log('Remove Payment From Event');
    console.log('editEventID  : ' + this.editEventID);
    console.log('paymentID  : ' + paymentID);
    this.eService.removePaymentAssingment(this.editEventID, paymentID).subscribe(data => {
      console.log(data);
      if (data == '1') {
        this.removeConfirmAsk = false;
      }
    });
  }
}// class
