import {Injectable} from '@angular/core';
import {PaymentMobile} from "../../payment/payment-mobile/payment-mobile.model";
import {News} from "./news.model";
import {AuthService} from "../../auth/auth.service";
import {HttpClient} from "@angular/common/http";

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

}
