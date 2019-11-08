import { Component, OnInit } from '@angular/core';
import { BasicService } from './basic.service';

@Component({
  selector: 'app-basic',
  templateUrl: './basic.component.html',
  styleUrls: ['./basic.component.scss']
})
export class BasicComponent implements OnInit {

  // dept: string[];
  blood: string[];
  profileEdit = false;

  id: string;
  user_id: string;
  dept: string;
  batch: string;
  student_id: string;
  passing_year: string;
  first_name: string;
  last_name: string;
  birth_date: string;
  gender: string;
  blood_group: string;
  email: string;
  phone: string;
  address_present: string;
  address_permanent: string;
  research_interest: string;
  skills: string;
  image_address: string;
  religion: string;
  social_media_link: string;

  constructor(private basic: BasicService) { }

  ngOnInit() {
    //not needed for now.
    // this.dept = this.basic.getDept();
    this.blood = this.basic.getBloodGroup();
  }

  public editProfile() {
    this.profileEdit = !this.profileEdit;
  }

  public save() {
    this.basic.save();
    this.editProfile();
    // console.log(this.deptName);
  }

}//class
