import {Component, OnInit} from '@angular/core';
import {Events} from '../event-manage/events.model';
import {EventDetailsService} from '../event-details/event-details.service';
import {ActivatedRoute} from '@angular/router';
import {HttpClient} from '@angular/common/http';
import {AuthService} from '../../auth/auth.service';
import {EventDetailsUserService} from './event-details-user.service';
import {PaymentMobile} from '../../payment/payment-mobile/payment-mobile.model';

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

  event = new Events();
  id: string;

  registered: boolean;
  paymentCheck: boolean;
  paymentMobile: PaymentMobile;

  constructor(
    private eventDeatailsService: EventDetailsService,
    private activeRoute: ActivatedRoute,
    private  userService: EventDetailsUserService) {
  }


  ngOnInit() {
    window.dispatchEvent(new Event('resize'));
    document.body.className = 'hold-transition skin-blue sidebar-mini';

    this.id = this.activeRoute.snapshot.params['id'];
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
      this.checkRegister();
      this.paymentChecking();
    });
  }

  /**
   * here only method will contact with server, for that service not created.
   */
  public register_to_event() {
    this.userService.register_to_event(this.event.$id).subscribe(data => {
      console.log(data);
      if (data['status'] > 0) {
        this.registered = true;
      } else if (data['status'] == 'registered') {
        this.registered = false;
      }
    });
  }

  public checkRegister() {
    console.log('checkRegister  : ' + this.event.$id);
    this.userService.checkRegister(this.event.$id).subscribe(data => {
      // console.log(data);
      if (data['status'] == 1) {
        this.registered = true;
      } else {
        this.registered = false;
      }
    });
  }


  public paymentChecking() {
    this.userService.checkPayment(this.event.$id).subscribe(data => {
      // console.log(data);
      if (data['status'] == 1) {
        this.paymentCheck = true;
        this.paymentMobile = data['data'];
        console.log(this.paymentMobile);
        console.log(this.paymentMobile['mobile_number']);
        console.log(this.paymentMobile['date']);
        // console.log(data['data']['status']);
      } else {
        this.paymentCheck = false;
      }
    });
  }


}// class
