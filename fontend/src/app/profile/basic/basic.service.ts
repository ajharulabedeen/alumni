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

    var token: string;
    token = "bearer" + this.authService.getToken();
    console.log(this.authService.getCurrentUser());

    //working but not understanding where to use.
    this.authService.getCurrentUser().subscribe(user => {
      console.log(user.token);
      console.log(user.email);
    });
    // token = "bearer" + "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2FwaVwvbG9naW4iLCJpYXQiOjE1NzM0NDg2ODUsImV4cCI6MTU3MzQ1MjI4NSwibmJmIjoxNTczNDQ4Njg1LCJqdGkiOiJVMUtMR2lmSTV1a2c4QzNiIiwic3ViIjo0LCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.RbA2CyB37SQIuHUl6fknC1wg4Dl7ycHEywr5VC-4iXw";
    // token = "bearer" + "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2FwaVwvbG9naW4iLCJpYXQiOjE1NzM0NDkxNjEsImV4cCI6MTU3MzQ1Mjc2MSwibmJmIjoxNTczNDQ5MTYxLCJqdGkiOiJtYjdPeTU4MUtvcXp3dHpxIiwic3ViIjo1LCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.ueCunE8u3vkbBF2Wbw8E6ctyYn3TaEy_l8vw2O1DEjM";
    // let headers = new Headers();
    // headers.append('Content-Type', 'application/json');
    // headers.append('AUTHORIZATION', token);

    let headers = new HttpHeaders({
      'Content-Type': 'application/json',
      'Authorization': token
    });
    let options = { headers: headers };

    console.log("Token : " + token);

    this.http.post(
      // 'http://127.0.0.1:8000/basic/findOneById',
      // 'http://127.0.0.1:8000/basic/create', basic
      'http://127.0.0.1:8000/api/basic/create', basic, options
    )
      .subscribe((res: Response) => {
        // this.data = res.json();
        console.log(res);
        this.loading = false;
      });
  }

  public getCurrentUserBasic() {
    var token: string;
    token = "bearer" + this.authService.getToken();
    let headers = new HttpHeaders({
      'Content-Type': 'application/json',
      'Authorization': token
    });
    let options = { headers: headers };
    return this.http.post<Basic>(
      'http://127.0.0.1:8000/api/basic/findOneById', [], options,
    )

      //working
      // .pipe(
      //   map(responseData => {
      //     const postsArray: Basic[] = [];
      //     for (const key in responseData) {
      //       console.log(key);
      //       if (responseData.hasOwnProperty(key)) {
      //         postsArray.push({ ...responseData[key], id: key });
      //       }
      //     }
      //     return postsArray;
      //   }),
      //   catchError(errorRes => {
      //     // Send to analytics server
      //     return throwError(errorRes);
      //   })
      // );

      .subscribe((b: Basic) => {
        this.loading = false;
        console.log(b);
        console.log(b["dept"]);
        // const bas = new Basic(b.id, b.user_id, b.dept, b.batch, b.student_id, b.passing_year, b.first_name, b.last_name, b.birth_date, b.gender, b.blood_group, b.email, b.phone, b.address_present, b.address_permanent, b.research_interest, b.skills, b.image_address, b.religion, b.social_media_link);
        const bas = new Basic();
        bas.$id     = b["id"];
        bas.$dept   = b["dept"];
        bas.$batch  = b["batch"];
        bas.$student_id = b["student_id"];
        bas.$passing_year = b["passing_year"];
        bas.$first_name = b["first_name"];
        bas.$last_name = b["last_name"];
        bas.$birth_date = b["birth_date"];
        bas.$gender = b["gender"];
        bas.$blood_group = b["blood_group"];
        bas.$religion = b["religion"];
        bas.$email = b["email"];
        bas.$address_permanent = b["address_permanent"];
        bas.$address_present = b["address_present"];
        bas.$research_interest = b["research_interest"];
        bas.$skills = b["skills"];
        bas.$social_media_link = b["social_media_link"];
        console.log("bas : " + bas.$dept);
        this.basic.next(bas);
      });
  }//get current user basic.


  public getCu() {
    return this.currentBasic;
  }

  public setBasic(res: Response) {
    // return new Basic(res.);
  }

  public save() {
    console.log("Prfile Basic Save : ");
  }

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
