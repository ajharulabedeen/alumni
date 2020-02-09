import {Component, OnInit} from '@angular/core';

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

  event_search_by: string;
  event_value_search: string;
  eventSearch_perPage: number;
  eventSearch_total: number;
  eventSearch_pageNumber: number;
  eventSearch_sort_by: string;
  eventSearch_sort_on: string;

  constructor() {
  }

  ngOnInit() {

    this.eventSearch_pageNumber = 1;
    this.eventSearch_perPage = 10;
    this.eventSearch_sort_by = 'ASC';
    this.event_search_by = 'title';
    this.eventSearch_sort_on = 'end_date';

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

  public refreshTable_eventSearch() {

  }
}// class
