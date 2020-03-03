import {Injectable} from '@angular/core';
import {PaymentMobile} from "../payment/payment-mobile/payment-mobile.model";
import {News} from "./news.model";
import {AuthService} from "../auth/auth.service";
import {HttpClient} from "@angular/common/http";
import {NewsNodetails} from "./news-nodetails.model";

@Injectable({
  providedIn: 'root'
})
export class NewsService {

  constructor(private http: HttpClient, private authService: AuthService) {
  }

  public saveNews(news: News) {
    // console.log(news);
    return this.http.post(
      'http://127.0.0.1:8000/news/save', news, this.authService.getHeader()
    );
    //   .subscribe((res: Response) => {
    //   console.log(res);
    // });
  }

  /**
   * @description here search method used - no search value, means all data will be loaded.
   * @param {number} per_page
   * @param {string} sort_by
   * @param {string} sort_on
   * @param {string} column_name
   * @param {string} key
   * @param {number} pageNumber
   * @returns {Observable<Object>}
   */
  public getAllNews(per_page: number, sort_by: string, sort_on: string, column_name: string, key: string, pageNumber: number) {
    key = '%' + key + '%';
    // return this.http.post<NewsNodetails>(
    return this.http.post(
      'http://127.0.0.1:8000/news/search?page=' + pageNumber,
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

  public delete(id: string) {
    return this.http.post(
      'http://127.0.0.1:8000/news/delete',
      {
        'id': id
      },
      this.authService.getHeader()
    );
  }

  public count(column_name: string, key: string) {
    key = '%' + key + '%';
    // return this.http.post<NewsNodetails>(
    return this.http.post(
      'http://127.0.0.1:8000/news/search_count',
      {
        'column_name': column_name,
        'key': key,
      },
      this.authService.getHeader()
    );
  }

  public newsDetails(id: string) {
    return this.http.post(
      'http://127.0.0.1:8000/news/findOne',
      {
        'id': id
      },
      this.authService.getHeader()
    );
  }

  updateNews(news: News) {
    console.log("News In Update Service : " + news.$id);
    console.log("News In Update Service : " + news.$title);
    return this.http.post(
      'http://127.0.0.1:8000/news/update',
      {
        'id': news.$id,
        'title': news.$title,
        'description': news.$description,
        'notes': news.$notes,
      }, this.authService.getHeader()
    );
  }
}// class
