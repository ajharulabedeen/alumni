import {Injectable} from '@angular/core';
import {BehaviorSubject} from 'rxjs';
import {HttpClient} from '@angular/common/http';
import {AuthService} from '../auth/auth.service';
import {Basic} from '../profile/basic/basic.model';

@Injectable({
  providedIn: 'root'
})
export class SearchService {

  constructor(private http: HttpClient, private authService: AuthService) {
  }

  basic = new BehaviorSubject<any>(null);

  public basicSearch(perPage_basic: number, pageNumber_basic: number, sort_on_basic: string, sort_by_basic: string, column_name_basic: string, key_basic: string) {
//     //for approve
    this.basic = new BehaviorSubject<any>(null);
    console.log('perPage_basic : ' + perPage_basic);
    console.log('sort_by : ' + sort_by_basic);
    console.log('sort_on : ' + sort_on_basic);
    console.log('column_name : ' + column_name_basic);
    console.log('key : ' + key_basic);


//     //for approve
    return this.http.post<Basic>(
      'http://127.0.0.1:8000/search/basic?page=' + pageNumber_basic,
      {
        'per_page': perPage_basic,
        'sort_by': sort_by_basic,
        'sort_on': sort_on_basic,
        'column_name': column_name_basic,
        'key': key_basic,
      },
      this.authService.getHeader(),
    ).subscribe((basic: Basic) => {
      // console.log("One Job : " + pt["0"]["organization_name"]);
      console.log(basic);
      this.basic.next(basic);
    });
  } // searchMobilePayment


}//
