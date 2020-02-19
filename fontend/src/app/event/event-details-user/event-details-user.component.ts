import {Component, OnInit} from '@angular/core';

@Component({
  selector: 'app-event-details-user',
  templateUrl: './event-details-user.component.html',
  styleUrls: ['./event-details-user.component.scss']
})
export class EventDetailsUserComponent implements OnInit {
  payIt_date: string;
  payIt_amount: string;
  payIt_mobile_number: string;
  payIt_payment_method: string;
  payIt_trx_id: string;

  constructor() {
  }

  ngOnInit() {
    window.dispatchEvent(new Event('resize'));
    document.body.className = 'hold-transition skin-blue sidebar-mini';
  }

}
