import { Injectable } from '@angular/core';
import {
  HttpClient,
  HttpHeaders,
  HttpParams,
  HttpEventType
} from '@angular/common/http';
import { map, catchError, tap } from 'rxjs/operators';
import { Subject, throwError, BehaviorSubject } from 'rxjs';

import { About } from './about.model';
import { AuthService } from 'src/app/auth/auth.service';


@Injectable({
  providedIn: 'root'
})
export class AboutService {

  constructor(private http: HttpClient, private authService: AuthService) { }

  data: Object;
  loading: boolean;

  about = new BehaviorSubject<About>(null);

  create(about: About) {
    console.log("Create : ");
    this.http.post(
      'http://127.0.0.1:8000/api/about/create ', about, this.authService.getHeader()
    ).subscribe((res: Response) => {
      console.log(res);
      this.loading = false;
    });
  }//create

  update(aboutUpdate: About) {
    this.http.post(
      'http://127.0.0.1:8000/api/about/update', aboutUpdate, this.authService.getHeader()
    ).subscribe((res: Response) => {
      console.log(res);
      this.loading = false;
    });
  }

  /**
   * name
   */
  public getCurrentUserAbout() {
    return this.http.post<About>(
      'http://127.0.0.1:8000/api/about/getAboutByUserId', [], this.authService.getHeader(),
    ).subscribe((a: About) => {
      this.loading = false;
      console.log(a);
      // console.log(b["dept"]);
      const ab = new About();
      ab.$id = a["id"];
      ab.$about_me = a["about_me"];
      console.log("about_me : " + a.$about_me);
      this.about.next(ab);
    });
  }


}//class
