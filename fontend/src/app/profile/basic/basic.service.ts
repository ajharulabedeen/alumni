import { Injectable } from '@angular/core';
import { HttpClient, HttpResponse, HttpHeaders } from '@angular/common/http';
// import {Http, Response} from '@angular/http';
import { Basic } from './basic.model';
import { AuthService } from '../../auth/auth.service';

@Injectable({
  providedIn: 'root'
})
export class BasicService {

  // constructor(private http: HttpClient) { }
  constructor(private http: HttpClient,
    private authService: AuthService) { }

  data: Object;
  loading: boolean;

  create(basic: Basic) {

    var token: string;
    token = "bearer" + this.authService.getToken();
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
