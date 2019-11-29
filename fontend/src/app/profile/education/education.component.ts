import { Component, OnInit, OnDestroy } from '@angular/core';
import { EducationService } from './education.service';
import { Education } from './education.model';

@Component({
  selector: 'app-education',
  templateUrl: './education.component.html',
  styleUrls: ['./education.component.scss']
})
export class EducationComponent implements OnInit, OnDestroy {

  id: string;
  user_id: string;
  degree_name: string;
  institue_name: string;
  passing_year: string;
  result: string;


  constructor(private eduService: EducationService) { }

  edit = false;
  educations = new Array();
  updateEducation = false;
  educationUpdate: Education;
  idUpdate: string;

  ngOnDestroy() {
    console.log("EducationComponent Destroyed!");
    this.educations = null;
    console.log(this.educations);
  }

  ngOnInit() {
    this.setEducations();
    console.log(this.educations);
  }

  /**
   * name
   */
  public editEducation() {
    console.log("---------");
    this.edit = !this.edit;
  }

  /**
   *  this save method is called from Modal save(), have to use for both save and update.
   *
   */
  public save() {
    // this.addNew = true;
    // console.log(this.getEducation());
    console.log("updateEducation : " + this.updateEducation);
    if (this.updateEducation) {
      this.educationUpdate = this.getEducation();
      this.educationUpdate.$id = this.idUpdate;
      // console.log("Education Update : ");
      // console.log(this.educationUpdate);
      this.eduService.update(this.educationUpdate);
      this.updateEducation = false;
      this.idUpdate = null;
    } else {
      this.eduService.create(this.getEducation());
    }
    this.setEducations();
  }

  public delete(id: string) {
    this.eduService.delete(id);
    this.setEducations();
  }

  /**
   * name
   */
  public update(e: Education) {
    this.updateEducation = true;
    // this.addNew = false;
    console.log("E CompEdit : " + e.$degree_name);
    this.setEducationForUpdate(e);
    this.idUpdate = e.$id;
  }
  /**
   *
   * @param education
   * this method will set the modal values.
   */
  public setEducationForUpdate(education: Education) {
    this.degree_name = education.$degree_name;
    this.institue_name = education.$institue_name;
    this.passing_year = education.$passing_year;
    this.result = education.$result;
  }
  public getEducation(): Education {
    var education = new Education();
    education.$degree_name = this.degree_name;
    education.$institue_name = this.institue_name;
    education.$passing_year = this.passing_year;
    education.$result = this.result;
    return education;
  }
  public setEducations() {
    this.educations = new Array();
    this.eduService.getCurrentUserEducation();
    this.eduService.educations.subscribe(e => {
      // console.log("Direct : " + e["0"]["id"]);
      for (const key1 in e) {
        // console.log("key1 : " + key1);
        // console.log("value : " + e[key1]["id"]);
        var e1 = new Education();
        e1.$id = e[key1]["id"];
        e1.$degree_name = e[key1]["degree_name"];
        e1.$institue_name = e[key1]["institue_name"];
        e1.$passing_year = e[key1]["passing_year"];
        e1.$result = e[key1]["result"];
        this.educations.push(e1);
      }
    });
  }

}//class
