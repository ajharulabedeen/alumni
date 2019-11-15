import { Component, OnInit } from '@angular/core';
import { BasicService } from './basic.service';
import { Basic } from './basic.model';
import { Observable } from 'rxjs';
import { subscribeOn } from 'rxjs/operators';

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

  basicExist: boolean;

  constructor(private basicService: BasicService) { }

  ngOnInit() {
    this.blood = this.basicService.getBloodGroup();
    this.basicExist = true;
    var b: Basic;
    console.log("---" + this.basicService.getCurrentUserBasic());
    console.log(this.basicService.basic.subscribe((b: Basic) => {
      console.log("Init : " + b.batch);
    }));

    this.basicService.basic.subscribe(b => {
      console.log(b);
      // for (const key in b) {
      //   const postsArray: Post[] = [];
      //   // console.log("Key : ");
      //   // console.log(b[key]);
      //   this.dept = b[key];
      //   console.log("dept : " + this.dept);
      // }
    });

    this.basicService.currentBasic.subscribe(b => {
      console.log(b.batch);
    });
  }

  public editProfile() {
    this.profileEdit = !this.profileEdit;
  }

  public save() {
    this.basicService.save();
    this.editProfile();
    // console.log(this.deptName);
    // this.getBasic();
    this.basicService.create(this.getBasic());
  }

  public getBasic() {
    var basic = new Basic(
      this.id,
      this.user_id,
      this.dept,
      this.batch,
      this.student_id,
      this.passing_year,
      this.first_name,
      this.last_name,
      this.birth_date,
      this.gender,
      this.blood_group,
      this.email,
      this.phone,
      this.address_present,
      this.address_permanent,
      this.research_interest,
      this.skills,
      this.image_address,
      this.religion,
      this.social_media_link);

    console.log(basic);
    return basic;
  }
}//class
