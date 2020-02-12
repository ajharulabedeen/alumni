import {Component, OnInit} from '@angular/core';
import {Events} from './events.model';
import {EventManageService} from './event-manage.service';
import {PaymentMobile} from '../../payment/payment-mobile/payment-mobile.model';

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

  constructor(private eService: EventManageService) {
  }

  ngOnInit() {

    this.eventSearch_pageNumber = 1;
    this.eventSearch_perPage = 10;
    this.eventSearch_sort_by = 'ASC';
    this.event_search_by = 'title';
    this.eventSearch_sort_on = 'end_date';
    this.setTotal();

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

  }

  public eventSearch_nextPage() {

  }

  public setTotal() {
    if (this.active_search) {

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
    this.eService.getAllEvents(this.eventSearch_perPage, this.eventSearch_sort_by, this.eventSearch_sort_on);
    this.setTotal();
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
    console.log(this.event_array);

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
    console.log('ID : ' + id);
    this.eService.getDescriptionNotes(id).subscribe(data => {
        this.deatilsDescription = data['description'];
        this.deatilsNotes = data['notes'];
    });
  }
}// class
