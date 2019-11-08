import { Injectable } from '@angular/core';
import { HttpClient, HttpResponse } from '@angular/common/http';
// import {Http, Response} from '@angular/http';
import { Basic } from './basic.model';

@Injectable({
  providedIn: 'root'
})
export class BasicService {

  // constructor(private http: HttpClient) { }
  constructor(private http: HttpClient) { }

  data: Object;
  loading: boolean;

  create( basic : Basic) {
    console.log("Gender : " + basic.getName());
    console.log("Gender 2: " + basic.last_name);
    this.http.post(
      // 'http://127.0.0.1:8000/basic/findOneById',
      'http://127.0.0.1:8000/basic/create',basic
      // {
      //   user_id: '1',
      //   first_name: '1',
      // }
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
