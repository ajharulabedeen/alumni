import { Injectable } from '@angular/core';
import {AuthService} from "../../auth/auth.service";
import {HttpClient} from "@angular/common/http";

@Injectable({
  providedIn: 'root'
})
export class EventUserService {

  constructor(private http: HttpClient,
              private authService: AuthService) { }

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

}// class
