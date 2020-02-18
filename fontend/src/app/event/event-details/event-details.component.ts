import {Component, OnInit} from '@angular/core';
import {ActivatedRoute} from '@angular/router';
import {Basic} from '../../profile/basic/basic.model';
import {EventDetailsService} from './event-details.service';

@Component({
  selector: 'app-event-details',
  templateUrl: './event-details.component.html',
  styleUrls: ['./event-details.component.scss']
})
export class EventDetailsComponent implements OnInit {

  id: string;

  basic_search_by: string;
  basic_value_search: string;
  basicSearch_pageNumber: number;
  basicSearch_sort_by: string;
  basicSearch_sort_on: string;

  basicSearch_perPage: number;
  basicSearch_total: number;

  baicSearch_profiles_array = new Array();


  constructor(private activeRoute: ActivatedRoute, private searchService : EventDetailsService) {
  }

  ngOnInit() {

    this.basic_search_by = 'student_id';
    this.basicSearch_sort_on = 'dept';
    this.basicSearch_perPage = 10;
    this.basicSearch_sort_by = 'ASC';
    this.basicSearch_pageNumber = 1;

    this.id = this.activeRoute.snapshot.params['id'];
    document.body.className = 'hold-transition skin-blue sidebar-mini';
    console.log(' ID : ' + this.id);
  }

  printId() {
    console.log(' ID : ' + this.id);
  }


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


}// class
