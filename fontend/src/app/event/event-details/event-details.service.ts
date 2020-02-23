import {Injectable} from '@angular/core';
import {BehaviorSubject} from 'rxjs';
import {Basic} from '../../profile/basic/basic.model';
import {HttpClient} from '@angular/common/http';
import {AuthService} from '../../auth/auth.service';
import {Events} from '../event-manage/events.model';
import {RegisteredUser} from './registered-user.model';

@Injectable({
  providedIn: 'root'
})
export class EventDetailsService {

  basic = new BehaviorSubject<any>(null);

  constructor(private http: HttpClient, private authService: AuthService) {
  }

  public basicSearch(
    perPage_basic: number,
    pageNumber_basic: number,
    sort_on_basic: string,
    sort_by_basic: string,
    column_name_basic: string,
    key_basic: string) {
//     //for approve
    this.basic = new BehaviorSubject<any>(null);
    // console.log('perPage_basic : ' + perPage_basic);
    // console.log('sort_by : ' + sort_by_basic);
    // console.log('sort_on : ' + sort_on_basic);
    // console.log('column_name : ' + column_name_basic);
    // console.log('key : ' + key_basic);


    return this.http.post<Basic>(
      'http://127.0.0.1:8000/search/basic?page='
      + pageNumber_basic,
      {
        'per_page': perPage_basic,
        'sort_by': sort_by_basic,
        'sort_on': sort_on_basic,
        'column_name': column_name_basic,
        'key': '%' + key_basic + '%',
      },
      this.authService.getHeader(),
    ).subscribe((basic: Basic) => {
      // console.log("One Job : " + pt["0"]["organization_name"]);
      console.log(basic);
      this.basic.next(basic);
    });
  } // searchMobilePayment


  public getBsicSearchCount(
    perPage_basic: number,
    pageNumber_basic: number,
    sort_on_basic: string,
    sort_by_basic: string,
    column_name_basic: string,
    key_basic: string) {
    return this.http.post(
      'http://127.0.0.1:8000/search/basic_count',
      {
        'per_page': perPage_basic,
        'sort_by': sort_by_basic,
        'sort_on': sort_on_basic,
        'column_name': column_name_basic,
        'key': '%' + key_basic + '%',
      }, this.authService.getHeader()
    );
    // .subscribe((res: Response) => {
    //   console.log();
    //   console.log(res);
    //   // return res;
    //   // return res["status"];
    // });
  }// getBsicSearchCount

  public getEvent(id: string) {
    return this.http.post<Events>(
      'http://127.0.0.1:8000/events/find_one',
      {
        'id': id,
      },
      this.authService.getHeader(),
    );
    //   .subscribe((e : Events) => {
    //   // console.log("One Job : " + pt["0"]["organization_name"]);
    //   console.log(e);
    //   // this.basic.next(basic);
    // });
  }

  getRegisteredUser(per_page: number,
                    sort_by: string,
                    sort_on: string,
                    column_name: string,
                    key: string,
                    event_id: string) {
    // return this.http.post<RegisteredUser>(//without it code working means data is being set registered user.
    return this.http.post(
      // this.http.post(
      'http://127.0.0.1:8000/events/getAllRegisteredUser',
      {
        'per_page': per_page,
        'sort_by': sort_by,
        'sort_on': sort_on,
        'column_name': column_name,
        'key': '%' + key + '%',
        'event_id': event_id,
      },
      this.authService.getHeader(),
    );
    // return obe;
  }

  countSearchRegisteredUser(column_name: string, key: string, event_id: string) {
    return this.http.post(
      'http://127.0.0.1:8000/events/countSearchRegisteredUser',
      {
        'column_name': column_name,
        'key': '%' + key + '%',
        'event_id': event_id,
      },
      this.authService.getHeader(),
    );
  }
}// class
