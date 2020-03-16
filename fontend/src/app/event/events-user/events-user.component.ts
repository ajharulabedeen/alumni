import {Component, OnInit} from '@angular/core';

@Component({
  selector: 'app-events-user',
  templateUrl: './events-user.component.html',
  styleUrls: ['./events-user.component.scss']
})
export class EventsUserComponent implements OnInit {

  constructor() {
  }

  ngOnInit() {
    window.dispatchEvent(new Event('resize'));
    document.body.className = 'hold-transition skin-blue sidebar-mini';
  }

}
