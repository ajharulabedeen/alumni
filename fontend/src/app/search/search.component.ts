import {Component, OnInit} from '@angular/core';
import {SearchService} from './search.service';
import {Basic} from '../profile/basic/basic.model';
import {EducationSearch} from './education-search.model';

@Component({
  selector: 'app-search',
  templateUrl: './search.component.html',
  styleUrls: ['./search.component.scss']
})
export class SearchComponent implements OnInit {


  constructor(private searchService: SearchService) {
  }

  ngOnInit() {

    // basic
    this.basic_search_by = 'student_id';
    this.basicSearch_sort_on = 'dept';
    this.basicSearch_perPage = 10;
    this.basicSearch_sort_by = 'ASC';
    this.basicSearch_pageNumber = 1;
    // basic
    // education
    this.education_search_by = 'institue_name';
    this.educationSearch_sort_on = 'batch';
    this.educationSearch_perPage = 10;
    this.educationSearch_sort_by = 'ASC';
    this.educationSearch_pageNumber = 1;
    // education

    window.dispatchEvent(new Event('resize'));
    document.body.className = 'hold-transition skin-blue sidebar-mini';
  }


  // start : for tab in font end.
  public searchTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName('tabcontent');
    // tabcontent[0].className = 'active';//not working
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = 'none';
    }
    tablinks = document.getElementsByClassName('tablinks');
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace('active', '');
    }
    document.getElementById(tabName).style.display = 'block';
    evt.currentTarget.className += ' active';
  }

  // end : for tab in font end.


// start : basic search

  // error : suggested to declear as class instance
  basic_search_by: string;
  basic_value_search: string;
  basicSearch_pageNumber: number;
  basicSearch_sort_by: string;
  basicSearch_sort_on: string;

  basicSearch_perPage: number;
  basicSearch_total: number;

  baicSearch_profiles_array = new Array();

  public refreshTable_basicSearch(): void {
    console.log('refreshTable_basicSearch :');
    // tslint:disable-next-line:max-line-length
    // this.setBasicSearchCount();
    this.searchService.basicSearch(this.basicSearch_perPage, this.basicSearch_pageNumber, this.basicSearch_sort_on, this.basicSearch_sort_by, this.basic_search_by, this.basic_value_search);
    this.searchService.basic.subscribe(b => {
      this.baicSearch_profiles_array = [];
      for (const key in b) {
        // console.log(b);
        var basic = new Basic();
        basic.$user_id = b[key]['user_id'];
        basic.$dept = b[key]['dept'];
        basic.$batch = b[key]['batch'];
        basic.$student_id = b[key]['student_id'];
        basic.$passing_year = b[key]['passing_year'];
        basic.$first_name = b[key]['first_name'];
        basic.$last_name = b[key]['last_name'];
        basic.$birth_date = b[key]['birth_date'];
        basic.$gender = b[key]['gender'];
        basic.$blood_group = b[key]['blood_group'];
        basic.$email = b[key]['email'];
        basic.$phone = b[key]['phone'];
        basic.$address_present = b[key]['address_present'];
        basic.$address_permanent = b[key]['address_permanent'];
        basic.$research_interest = b[key]['research_interest'];
        basic.$skills = b[key]['skills'];
        basic.$image_address = b[key]['image_address'];
        basic.$religion = b[key]['religion'];
        basic.$social_media_link = b[key]['social_media_link'];
        this.baicSearch_profiles_array.push(basic);
      }// for
    });
    // console.log(this.baicSearch_profiles_array);
  }// refreshTable_basicSearch
  public basicSearch_previousPage() {
    console.log('basicSearch_previousPage');
    if (this.basicSearch_pageNumber > 1) {
      this.basicSearch_pageNumber -= 1;
      this.refreshTable_basicSearch();
    }
  }

  public basicSearch_nextPage() {
    console.log('basicSearch_nextPage');
    if (this.basicSearch_pageNumber < (this.basicSearch_total / this.basicSearch_perPage)) {
      this.basicSearch_pageNumber += 1;
      this.refreshTable_basicSearch();
    }
  }

  public setBasicSearchCount() {
    this.basicSearch_pageNumber = 1;
    this.searchService.getBsicSearchCount(this.basicSearch_perPage, this.basicSearch_pageNumber, this.basicSearch_sort_on, this.basicSearch_sort_by, this.basic_search_by, this.basic_value_search)
      .subscribe(res => {
        this.basicSearch_total = res['status'];
      });
    this.refreshTable_basicSearch();
  }

// end : basic search

//  start : education
  education_search_by: string;
  education_value_search: string;
  educationSearch_pageNumber: number;
  educationSearch_sort_by: string;
  educationSearch_sort_on: string;

  educationSearch_perPage: number;
  educationSearch_total: number;

  education_array = new Array();

  public refreshTable_educationSearch(): void {
    console.log('refreshTable_educationSearch :');
    // tslint:disable-next-line:max-line-length
    // this.setBasicSearchCount();
    this.searchService.educationSearch(
      this.educationSearch_perPage,
      this.educationSearch_pageNumber,
      this.educationSearch_sort_on,
      this.educationSearch_sort_by,
      this.education_search_by,
      this.education_value_search);

    this.searchService.education.subscribe(b => {
      this.education_array = [];
      for (const key in b) {
        // console.log(b);
        var edu = new EducationSearch();
        edu.$user_id = b[key]['user_id'];
        edu.$name = b[key]['first_name'] + ' ' + b[key]['last_name'];
        edu.$student_id = b[key]['student_id'];
        edu.$dept = b[key]['dept'];
        edu.$batch = b[key]['batch'];
        edu.$degree_name = b[key]['degree_name'];
        edu.$institue_name = b[key]['institue_name'];
        edu.$passing_year = b[key]['passing_year'];
        this.education_array.push(edu);
      }// for
    });
    console.log(this.education_array);
  }// refreshTable_educationSearch

  public educationSearch_previousPage() {
    console.log('educationSearch_previousPage');
    if (this.educationSearch_pageNumber > 1) {
      this.educationSearch_pageNumber -= 1;
      this.refreshTable_educationSearch();
    }
  }

  public educationSearch_nextPage() {
    console.log('educationSearch_nextPage');
    if (this.educationSearch_pageNumber < (this.educationSearch_total / this.educationSearch_perPage)) {
      this.educationSearch_pageNumber += 1;
      this.refreshTable_educationSearch();
    }
  }

  public setEducationSearchCount() {
    this.educationSearch_pageNumber = 1;
    this.searchService.getEducationSearchCount(
      this.educationSearch_perPage,
      this.educationSearch_pageNumber,
      this.educationSearch_sort_on,
      this.educationSearch_sort_by,
      this.education_search_by,
      this.education_value_search
    )
      .subscribe(res => {
        this.educationSearch_total = res['status'];
      });
    this.refreshTable_educationSearch();
  }

//  end : education



}//class
