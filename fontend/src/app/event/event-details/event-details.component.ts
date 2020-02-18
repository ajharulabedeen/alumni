import {Component, OnInit} from '@angular/core';
import {ActivatedRoute} from '@angular/router';

@Component({
  selector: 'app-event-details',
  templateUrl: './event-details.component.html',
  styleUrls: ['./event-details.component.scss']
})
export class EventDetailsComponent implements OnInit {

  id: string;

  constructor(private activeRoute: ActivatedRoute) {
  }

  ngOnInit() {
    this.id = this.activeRoute.snapshot.params['id'];
    document.body.className = 'hold-transition skin-blue sidebar-mini';
    console.log(' ID : ' + this.id);
  }

  printId() {
    console.log(' ID : ' + this.id);
  }
}
