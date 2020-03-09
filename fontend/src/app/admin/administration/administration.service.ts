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
    return this.http.post(
      'http://127.0.0.1:8000/administrator/save', adminis, this.authService.getHeader()
    );
    //   .subscribe((res: Response) => {
    //   console.log(res);
    //   // this.loading = false;
    // });
    // try {
    //   this.http.post(
    //     'http://127.0.0.1:8000/administrator/save', adminis, this.authService.getHeader()
    //   ).subscribe((res: Response) => {
    //     console.log(res);
    //     // this.loading = false;
    //   });
    // } catch (e) {
    //   console.log("Error Save!");
    // }
  }

  public getAll() {
    return this.http.post(
      'http://127.0.0.1:8000/administrator/getAll',
      {},
      this.authService.getHeader()
    )
  }

  public delete(id: string) {
    return this.http.post(
      'http://127.0.0.1:8000/administrator/delete', {
        'id': id,
      }, this.authService.getHeader()
    );
  }

  public getAssignedPeople(selected_role_id: string) {
    return this.http.post(
      'http://127.0.0.1:8000/administrator/get_assigned_people', {
        'role_id': selected_role_id,
      }, this.authService.getHeader()
    );
  }

  public remove_people(remove_id: string) {
    return this.http.post(
      'http://127.0.0.1:8000/administrator/remove_people', {
        'id': remove_id,
      }, this.authService.getHeader()
    );
  }
}// class
