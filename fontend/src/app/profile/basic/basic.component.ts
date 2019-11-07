import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-basic',
  templateUrl: './basic.component.html',
  styleUrls: ['./basic.component.scss']
})
export class BasicComponent implements OnInit {

  constructor() { }
  ngOnInit() {
  }

  dept: string[] = ["CSE", "EEE", "TEX", "FTDM","BBS","BBA","LAW"];

profileEdit = false;

public editProfile() {
  this.profileEdit = !this.profileEdit;
}




}//class
