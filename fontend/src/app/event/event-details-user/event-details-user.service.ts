import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {AuthService} from '../../auth/auth.service';

@Injectable({
  providedIn: 'root'
})
export class EventDetailsUserService {

  constructor(private http: HttpClient,
              private authService: AuthService) {
  }


  public register_to_event(id: string) {
    return this.http.post(
      'http://127.0.0.1:8000/events/eventRegistration',
      {
        'event_id': id,
      },
      this.authService.getHeader()
    );
  }

  checkRegister(id: string) {
    console.log("eID  :" + id);
    return this.http.post(
      'http://127.0.0.1:8000/events/checkEventRegistration',
      {
        'event_id': id,
      },
      this.authService.getHeader()
    );
  }
}// class
