import {Injectable} from '@angular/core';
import {Events} from './events.model';
import {HttpClient} from '@angular/common/http';
import {AuthService} from '../../auth/auth.service';
import {BehaviorSubject} from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class EventManageService {

  events = new BehaviorSubject<Events>(null);

  constructor(private http: HttpClient,
              private authService: AuthService) {
  }

  public save(event: Events) {
    this.http.post(
      'http://127.0.0.1:8000/events/create', event, this.authService.getHeader()
    ).subscribe((res: Response) => {
      console.log(res);
      // this.loading = false;
    });
  }


  public getAllEvents(per_page: number, sort_by: string, sort_on: string) {
    this.http.post(
      'http://127.0.0.1:8000/events/getAllEvents',
      {
        'per_page': per_page,
        'sort_by': sort_by,
        'sort_on': sort_on,
      },
      this.authService.getHeader()
  ).
    subscribe((res: Response) => {
      console.log(res);
      // this.loading = false;
    });
  }

  public couunt_all(){
    this.http.post(
      'http://127.0.0.1:8000/events/count_all',
      {},
      this.authService.getHeader()
    ).subscribe((res: Response) => {
      console.log(res);
      // this.loading = false;
    });
  }

}// class
