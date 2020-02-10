import {Injectable} from '@angular/core';
import {Events} from './events.model';
import {HttpClient} from '@angular/common/http';
import {AuthService} from '../../auth/auth.service';

@Injectable({
  providedIn: 'root'
})
export class EventManageService {

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


}// class
