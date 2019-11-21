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


  update(basic: About) {

  }

  /**
   * name
   */
  public getCurrentUserAbout() {

  }


}//class
