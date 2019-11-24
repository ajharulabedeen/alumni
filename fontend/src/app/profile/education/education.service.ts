import { Injectable, OnDestroy } from '@angular/core';
import { BehaviorSubject } from 'rxjs';
import { Education } from './education.model';
import { HttpClient } from '@angular/common/http';
import { AuthService } from 'src/app/auth/auth.service';

@Injectable({
  providedIn: 'root'
})
export class EducationService implements OnDestroy {

  // educations = new BehaviorSubject<Education>(null);
  educations = new BehaviorSubject<any>(null);
  edu = new Array();

  constructor(private http: HttpClient, private authService: AuthService) { }

  ngOnDestroy() {
    // this.educations.closed;
  }

  create(education: Education) {
    console.log("Create : ");
    this.http.post(
      'http://127.0.0.1:8000/api/education/create', education, this.authService.getHeader()
    ).subscribe((res: Response) => {
      console.log(res);
    });
  }//create

  public delete(id: string) {
    this.http.post(
      'http://127.0.0.1:8000/api/education/deleteOne', { 'id': id }, this.authService.getHeader()
    ).subscribe((res: Response) => {
      console.log(res);
    });
  }


  /**
   * name
   */
  public update(e: Education) {
    console.log(e);
    this.http.post(
      'http://127.0.0.1:8000/api/education/update', e, this.authService.getHeader()
    ).subscribe((res: Response) => {
      console.log(res);
    });
  }

  /**
   * name
   */
  public getCurrentUserEducation() {
    // this.dummyEducationArray();
    this.educations = new BehaviorSubject<any>(null);
    return this.http.post<Education>(
      'http://127.0.0.1:8000/api/education/getAllEducationsByUserId', [], this.authService.getHeader(),
    ).subscribe((e: Education) => {
      console.log("One Education : " + e["0"]["institue_name"]);
      this.educations.next(e);
    });
  }



  /**
   * name
   */
  public dummyEducationArray() {
    var e1 = new Education();
    e1.$degree_name = "SSC";
    e1.$institue_name = "Shapur School";
    e1.$passing_year = "2008";
    e1.$result = "3.94";
    this.edu.push(e1);
    var e2 = new Education();
    e2.$degree_name = "HSC";
    e2.$institue_name = "Shapur Maghugram Collage";
    e2.$passing_year = "2012";
    e2.$result = "4.34";
    this.edu.push(e2);
    var e3 = new Education();
    e3.$degree_name = "BsC";
    e3.$institue_name = "Green University";
    e3.$passing_year = "2017";
    e3.$result = "..64";
    this.edu.push(e3);

    this.educations.next(this.edu);

  }

}//class
