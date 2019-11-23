import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';
import { Education } from './education.model';

@Injectable({
  providedIn: 'root'
})
export class EducationService {

  educations = new BehaviorSubject<Education[]>(null);

  constructor() { }

  /**
   * name
   */
  public save() {

  }

  /**
   * name
   */
  public update() {

  }

  /**
   * name
   */
  public getCurrentUserEducation() {
    var edu = new Array();

    var e1 = new Education();
    e1.$degree_name = "SSC";
    e1.$institue_name = "Shapur School";
    e1.$passing_year = "2008";
    e1.$result = "3.94";
    edu.push(e1);
    var e2 = new Education();
    e2.$degree_name = "HSC";
    e2.$institue_name = "Shapur Maghugram Collage";
    e2.$passing_year = "2012";
    e2.$result = "4.34";
    edu.push(e2);
    var e3 = new Education();
    e3.$degree_name = "BsC";
    e3.$institue_name = "Green University";
    e3.$passing_year = "2017";
    e3.$result = "..64";
    edu.push(e3);

    this.educations.next(edu);

  }




}//class
