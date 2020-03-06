import {Injectable} from '@angular/core';
import {AuthService} from "../../auth/auth.service";
import {HttpClient} from "@angular/common/http";
import {Events} from "../../event/event-manage/events.model";
import {Administration} from "./administration.model";
import {tryCatch} from "rxjs/internal-compatibility";

@Injectable({
  providedIn: 'root'
})
export class AdministrationService {

  constructor(private http: HttpClient,
              private authService: AuthService) {
  }

  public save(adminis: Administration) {
    console.log("Service Save!");
    try {
      this.http.post(
        'http://127.0.0.1:8000/administrator/save', adminis, this.authService.getHeader()
      ).subscribe((res: Response) => {
        console.log(res);
        // this.loading = false;
      });
    } catch (e) {
      console.log("Error Save!");
    }
  }

}// class
