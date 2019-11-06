import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-basic',
  templateUrl: './basic.component.html',
  styleUrls: ['./basic.component.scss']
})
export class BasicComponent implements OnInit {

  constructor() { }


  profileEdit = false;

  public editProfile() {
    this.profileEdit = !this.profileEdit;
  }

  ngOnInit() {
  }

}
