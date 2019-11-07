import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class BasicService {

  constructor() { }

  create() {

  }

  public getDept() {
    var dept: string[] = ["CSE", "EEE", "TEX", "FTDM", "BBS", "BBA", "LAW"];
    return dept;
  }

  public getBloodGroup() {
    var blood: string[] = ["A+", "B+", "O+", "A-", "B-", "O-", "AB+","AB-"];
    return blood;

  }
}//class
