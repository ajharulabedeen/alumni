import { Injectable } from '@angular/core';
import { HttpClient, HttpResponse, HttpHeaders } from '@angular/common/http';
import { Basic } from './basic.model';
import { AuthService } from '../../auth/auth.service';
import { tap, catchError, map } from 'rxjs/operators';
import { throwError, BehaviorSubject } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class BasicService {
  // currentBasic : Basic;
  basic = new BehaviorSubject<Basic>(null);
  currentBasic = this.basic.asObservable();

  // constructor(private http: HttpClient) { }
  constructor(private http: HttpClient,
    private authService: AuthService) { }

  data: Object;
  loading: boolean;

  create(basic: Basic) {
    this.http.post(
      'http://127.0.0.1:8000/api/basic/create', basic, this.authService.getHeader()
    ).subscribe((res: Response) => {
      console.log(res);
      this.loading = false;
    });
  }//create


  update(basic: Basic) {
    this.http.post(
      'http://127.0.0.1:8000/api/basic/update', basic, this.authService.getHeader()
    ).subscribe((res: Response) => {
      console.log(res);
      this.loading = false;
    });
  }//create


  public getCurrentUserBasic() {
    return this.http.post<Basic>(
      'http://127.0.0.1:8000/api/basic/findOneById', [], this.authService.getHeader(),
    ).subscribe((b: Basic) => {
      this.loading = false;
      console.log(b);
      // console.log(b["dept"]);
      const bas = new Basic();
      bas.$id   = b["id"];
      bas.$dept = b["dept"];
      bas.$batch = b["batch"];
      bas.$student_id = b["student_id"];
      bas.$passing_year = b["passing_year"];
      bas.$first_name = b["first_name"];
      bas.$last_name = b["last_name"];
      bas.$birth_date = b["birth_date"];
      bas.$gender = b["gender"];
      bas.$blood_group = b["blood_group"];
      bas.$religion = b["religion"];
      bas.$email = b["email"];
      bas.$phone = b["phone"];
      bas.$address_permanent = b["address_permanent"];
      bas.$address_present = b["address_present"];
      bas.$research_interest = b["research_interest"];
      bas.$skills = b["skills"];
      bas.$social_media_link = b["social_media_link"];
      console.log("bas : " + bas.$dept);
      this.basic.next(bas);
    });
  }//get current user basic.

  public getDept() {
    var dept: string[] = ["CSE", "EEE", "TEX", "FTDM", "BBS", "BBA", "LAW"];
    return dept;
  }

  public getBloodGroup() {
    var blood: string[] = ["A+", "B+", "O+", "A-", "B-", "O-", "AB+", "AB-"];
    return blood;
  }
}//class
//working
      // {
      //   user_id: '1',
      //   first_name: '1',
      // }
