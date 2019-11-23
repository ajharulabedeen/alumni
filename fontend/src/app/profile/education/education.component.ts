import { Component, OnInit } from '@angular/core';
import { EducationService } from './education.service';

@Component({
  selector: 'app-education',
  templateUrl: './education.component.html',
  styleUrls: ['./education.component.scss']
})
export class EducationComponent implements OnInit {

  constructor(private eduService : EducationService) { }

  edit = false;

  ngOnInit() {
    this.eduService.getCurrentUserEducation();
    this.eduService.educations.subscribe(e =>{
        console.log(e);
    });
  }

  /**
   * name
   */
  public editEducation() {
    console.log("---------");
    this.edit = !this.edit;
  }

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

}//class
