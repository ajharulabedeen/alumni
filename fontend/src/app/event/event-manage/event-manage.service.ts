import {Injectable} from '@angular/core';
import {Events} from './events.model';
import {HttpClient} from '@angular/common/http';
import {AuthService} from '../../auth/auth.service';
import {BehaviorSubject} from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class EventManageService {

  // events = new BehaviorSubject<Events>(null);
  events = new BehaviorSubject<any>(null);

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


  public getAllEvents(per_page: number, sort_by: string, sort_on: string, pageNumber: number) {
    this.http.post(
      'http://127.0.0.1:8000/events/getAllEvents?page=' + pageNumber,
      {
        'per_page': per_page,
        'sort_by': sort_by,
        'sort_on': sort_on,
      },
      this.authService.getHeader()
    ).subscribe((res: Response) => {
      // console.log(res);
      // this.loading = false;
      this.events.next(res);
    });
  }

  public couunt_all() {
    return this.http.post(
      'http://127.0.0.1:8000/events/count_all',
      {},
      this.authService.getHeader()
    );
    //   .subscribe((res: Response) => {
    //   console.log(res);
    //   // this.loading = false;
    // });
  }

  public getDescriptionNotes(id: string) {
    return this.http.post(
      'http://127.0.0.1:8000/events/getDescriptionNotes',
      {
        'id': id
      },
      this.authService.getHeader()
    );
  }

  public delete(id: string) {
    return this.http.post(
      'http://127.0.0.1:8000/events/delete',
      {
        'id': id
      },
      this.authService.getHeader()
    );
  }

  public eventSearch(
    per_page: number,
    sort_by: string,
    sort_on: string,
    pageNumber: number,
    column_name: string,
    key: string
  ) {
    key = '%' + key + '%';
    this.http.post(
      'http://127.0.0.1:8000/events/search_event?page=' + pageNumber,
      {
        'per_page': per_page,
        'sort_by': sort_by,
        'sort_on': sort_on,
        'column_name': column_name,
        'key': key,
      },
      this.authService.getHeader()
    ).subscribe((res: Response) => {
      // console.log(res);
      // this.loading = false;
      this.events.next(res);
    });

  }
}// class
