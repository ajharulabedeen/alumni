import {Injectable} from '@angular/core';
import {AuthService} from "../../auth/auth.service";
import {HttpClient} from "@angular/common/http";

@Injectable({
  providedIn: 'root'
})
export class EventUserService {

  constructor(private http: HttpClient,
              private authService: AuthService) {
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
    return this.http.post(
      'http://127.0.0.1:8000/events/search_event?page=' + pageNumber,
      {
        'per_page': per_page,
        'sort_by': sort_by,
        'sort_on': sort_on,
        'column_name': column_name,
        'key': key,
      },
      this.authService.getHeader()
    );

    //   .subscribe((res: Response) => {
    //   // console.log(res);
    //   // this.loading = false;
    //   this.events.next(res);
    // });
  }


  public count_search(event_search_by: string, event_value_search: string) {
    event_value_search = '%' + event_value_search + '%';
    return this.http.post(
      'http://127.0.0.1:8000/events/search_event_count',
      {
        'column_name': event_search_by,
        'key': event_value_search,
      },
      this.authService.getHeader()
    );
  }
}// class
