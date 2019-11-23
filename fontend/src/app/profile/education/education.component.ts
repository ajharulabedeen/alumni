import { Component, OnInit } from '@angular/core';
import { EducationService } from './education.service';

@Component({
  selector: 'app-education',
  templateUrl: './education.component.html',
  styleUrls: ['./education.component.scss']
})
export class EducationComponent implements OnInit {

  constructor(private eduService: EducationService) { }

  edit = false;

  ngOnInit() {
    this.eduService.getCurrentUserEducation();
    this.eduService.educations.subscribe(e => {
      // console.log("Direct : " + e["0"]["id"]);
      for (const key1 in e) {
        console.log("key1 : " + key1);
        console.log("value : " + e[key1]["id"]);

        // for (const key2 in e[key1]) {
        //   console.log(e[key1][key2]);
        // }
      }
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
