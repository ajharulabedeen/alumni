import {Injectable} from '@angular/core';
import {BehaviorSubject} from 'rxjs';
import {HttpClient} from '@angular/common/http';
import {AuthService} from '../auth/auth.service';
import {Basic} from '../profile/basic/basic.model';
import {EducationSearch} from './education-search.model';

@Injectable({
  providedIn: 'root'
})
export class SearchService {

  constructor(private http: HttpClient, private authService: AuthService) {
  }

  // refactor : instead of any, might need to give type.
  basic = new BehaviorSubject<any>(null);
  education = new BehaviorSubject<any>(null);

  public educationSearch(
    educationSearch_perPage: number,
    educationSearch_pageNumber: number,
    educationSearch_sort_on: string,
    educationSearch_sort_by: string,
    education_search_by: string,
    education_value_search: string) {

    console.log('perPage_edu : ' + educationSearch_perPage);
    console.log('sort_by : ' + educationSearch_sort_by);
    console.log('sort_on : ' + educationSearch_sort_on);
    console.log('column_name : ' + education_search_by);
    console.log('key : ' + education_value_search);

    this.basic = new BehaviorSubject<any>(null);
    return this.http.post<EducationSearch>
    ('http://127.0.0.1:8000/search/education?page=' + educationSearch_pageNumber,
      {
        'per_page': educationSearch_perPage,
        'sort_by': educationSearch_sort_by,
        'sort_on': educationSearch_sort_on,
        'column_name': education_search_by,
        'key': '%' + education_value_search + '%',
      },
      this.authService.getHeader(),
  ).subscribe((edu: EducationSearch) => {
      // console.log("One Job : " + pt["0"]["organization_name"]);
      console.log(edu);
      this.education.next(edu);
    });
  }


  public basicSearch(
    perPage_basic: number,
    pageNumber_basic: number,
    sort_on_basic: string,
    sort_by_basic: string,
    column_name_basic: string,
    key_basic: string) {
//     //for approve
    this.education = new BehaviorSubject<any>(null);
    // console.log('perPage_basic : ' + perPage_basic);
    // console.log('sort_by : ' + sort_by_basic);
    // console.log('sort_on : ' + sort_on_basic);
    // console.log('column_name : ' + column_name_basic);
    // console.log('key : ' + key_basic);


    return this.http.post<Basic>(
      'http://127.0.0.1:8000/search/basic?page=' + pageNumber_basic,
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
      // console.log(basic);
      this.education.next(basic);
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
}//
