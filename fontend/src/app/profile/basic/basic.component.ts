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


  loadedPosts: Basic[] = [];
  isFetching = false;
  error = null;

  ngOnInit() {
    this.blood = this.basicService.getBloodGroup();
    this.basicExist = true;
    var b: Basic;
    console.log("---" + this.basicService.getCurrentUserBasic());
    // console.log(this.basicService.basic.subscribe((b: Basic) => {
    //   console.log("Init : " + b.batch);
    // }));

    this.basicService.getCurrentUserBasic();

    this.basicService.basic.subscribe(b => {
      for (const key in b) {
        console.log(key + " : " + b[key]);

        switch (key) {
          case "user_id": {
            this.user_id = b[key];
            break;
          }
          case "dept": {
            this.dept = b[key];
            break;
          }
          case "batch": {
            this.batch = b[key];
            break;
          }
          case "student_id": {
            this.student_id = b[key];
            break;
          }
          case "passing_year": {
            this.passing_year = b[key];
            break;
          }
          case "first_name": {
            this.first_name = b[key];
            break;
          }
          case "last_name": {
            this.last_name = b[key];
            break;
          }
          case "birth_date": {
            this.birth_date = b[key];
            console.log("this.birth_date  : " + this.birth_date);
            break;
          }
          case "gender": {
            this.gender = b[key];
            break;
          }
          case "blood_group": {
            this.blood_group = b[key];
            break;
          }
          case "email": {
            this.email = b[key];
            break;
          }
          case "phone": {
            this.phone = b[key];
            break;
          }
          case "address_present": {
            this.address_present = b[key];
            break;
          }
          case "address_permanent": {
            this.address_permanent = b[key];
            break;
          }
          case "research_interest": {
            this.research_interest = b[key];
            break;
          }
          case "skills": {
            this.skills = b[key];
            break;
          }
          case "image_address": {
            this.image_address = b[key];
            break;
          }
          case "religion": {
            this.religion = b[key];
            break;
          }
          case "social_media_link": {
            this.social_media_link = b[key];
            break;
          }
          default: {
            // console.log("Invalid choice");
            break;
          }
        }
      }//for

      console.log("Length : " + this.loadedPosts.length);
    });

    // this.basicService.currentBasic.subscribe(b => {
    //   console.log(b.batch);
    // });
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
    var basic: Basic;
    // var basic = new Basic(
    //   this.id,
    //   this.user_id,
    //   this.dept,
    //   this.batch,
    //   this.student_id,
    //   this.passing_year,
    //   this.first_name,
    //   this.last_name,
    //   this.birth_date,
    //   this.gender,
    //   this.blood_group,
    //   this.email,
    //   this.phone,
    //   this.address_present,
    //   this.address_permanent,
    //   this.research_interest,
    //   this.skills,
    //   this.image_address,
    //   this.religion,
    //   this.social_media_link);

    console.log(basic);
    return basic;
  }
}//class
