import {Component, OnInit} from '@angular/core';
import {Events} from "../event-manage/events.model";
import {EventManageService} from "../event-manage/event-manage.service";
import {EventUserService} from "./event-user.service";

@Component({
  selector: 'app-events-user',
  templateUrl: './events-user.component.html',
  styleUrls: ['./events-user.component.scss']
})
export class EventsUserComponent implements OnInit {

  event_array = new Array();
  event_search_by: string;
  event_value_search: string;
  eventSearch_perPage: number;
  eventSearch_total: number;
  eventSearch_pageNumber: number;
  eventSearch_sort_by: string;
  eventSearch_sort_on: string;
  private active_search: true;


  constructor(private eService: EventUserService) {
  }

  ngOnInit() {
    this.eventSearch_pageNumber = 1;
    this.eventSearch_perPage = 10;
    this.eventSearch_sort_by = 'ASC';
    this.event_search_by = 'title';
    this.eventSearch_sort_on = 'end_date';
    this.event_value_search = '';
    this.setTotal();

    window.dispatchEvent(new Event('resize'));
    document.body.className = 'hold-transition skin-blue sidebar-mini';

    this.refreshTable_event();
  }

  // public

  public refreshTable_event() {
    this.event_array = [];
    // console.log("\n Search Active!");
    this.setTotal();
    this.eService.eventSearch(
      this.eventSearch_perPage,
      this.eventSearch_sort_by,
      this.eventSearch_sort_on,
      this.eventSearch_pageNumber,
      this.event_search_by,
      this.event_value_search).subscribe(e => {
      console.log(e);
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

  public setTotal() {
    this.eService.count_search(this.event_search_by, this.event_value_search).subscribe(res => {
      // console.log(res);
      this.eventSearch_total = res['data'];
    });
  }

  public eventSearch_previousPage() {
    if (this.eventSearch_pageNumber > 1) {
      this.eventSearch_pageNumber -= 1;
      this.refreshTable_event();
    }
  }

  public eventSearch_nextPage() {
    if (this.eventSearch_pageNumber < (this.eventSearch_total / this.eventSearch_perPage)) {
      this.eventSearch_pageNumber += 1;
      this.refreshTable_event();
    }
  }


} // class
