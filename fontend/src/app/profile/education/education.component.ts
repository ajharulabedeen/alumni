import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-education',
  templateUrl: './education.component.html',
  styleUrls: ['./education.component.scss']
})
export class EducationComponent implements OnInit {

  constructor() { }

  edit = false;

  ngOnInit() {
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
