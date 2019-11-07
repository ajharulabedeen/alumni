import { Component, OnInit } from '@angular/core';
import { BasicService } from './basic.service';

@Component({
  selector: 'app-basic',
  templateUrl: './basic.component.html',
  styleUrls: ['./basic.component.scss']
})
export class BasicComponent implements OnInit {

  dept: string[];
  blood: string[]
  constructor(private basic: BasicService) { }

  ngOnInit() {
    this.dept = this.basic.getDept();
    this.blood = this.basic.getBloodGroup();
  }


  profileEdit = false;

  public editProfile() {
    this.profileEdit = !this.profileEdit;
  }

  public save() {
    this.basic.save();
    this.editProfile()
  }



}//class
