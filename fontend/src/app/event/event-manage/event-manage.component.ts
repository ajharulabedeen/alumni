import { Component, OnInit } from '@angular/core';

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

  constructor() { }

  ngOnInit() {
    window.dispatchEvent(new Event('resize'));
    document.body.className = 'hold-transition skin-blue sidebar-mini';
  }


}//class
