import {Component, OnInit} from '@angular/core';
import {AdministrationService} from "./administration.service";
import {Administration} from "./administration.model";
import {Events} from "../../event/event-manage/events.model";
import {SearchService} from "../../search/search.service";
import {Basic} from "../../profile/basic/basic.model";
import {AssignedPeopleToRole} from "./assigned-people-to-role.model";
import {getMatIconFailedToSanitizeLiteralError} from "@angular/material";

@Component({
  selector: 'app-administration',
  templateUrl: './administration.component.html',
  styleUrls: ['./administration.component.scss']
})
export class AdministrationComponent implements OnInit {

  constructor(private adminisService: AdministrationService, private searchService: SearchService) {
  }

  add_new: boolean;

  roles = new Array();
  role_details: string;
  role_title: string;

  role_show_title: string;
  role_show_detils: string;

  selected_role_id: string;
  selected_role_name: string;
  remove_id: string;

  ngOnInit() {

    // basic
    this.basic_search_by = 'student_id';
    this.basicSearch_sort_on = 'dept';
    this.basicSearch_perPage = 10;
    this.basicSearch_sort_by = 'ASC';
    this.basicSearch_pageNumber = 1;
    this.basic_value_search = "";
    // basic

    window.dispatchEvent(new Event('resize'));
    document.body.className = 'hold-transition skin-blue sidebar-mini';
    this.refresh_table();
    this.searchTab(event, 'all_events');
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

  public refresh_table() {
    this.roles = new Array();
    this.adminisService.getAll().subscribe(res => {
      console.log(res);
      for (const key1 in res) {
        var ad = new Administration();
        ad.$id = res[key1]['id'];
        ad.$title = res[key1]["title"];
        ad.$description = res[key1]["description"];
        this.roles.push(ad);
      }
    });
  }

  public save() {
    var ad = new Administration();
    ad.$title = this.role_title;
    ad.$description = this.role_details;
    console.log("Role Save :");
    this.adminisService.save(ad).subscribe(res => {
      console.log(res);
      if (res > 0) {
        this.refresh_table();
      }
    });
  }

  public delete(id: string) {
    this.adminisService.delete(id).subscribe(res => {
      console.log(res);
      if (res['status'] == 1) {
        this.refresh_table();
      }
    });
  }


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
  assigned_people_array = new Array();

  public refreshTable_basicSearch(): void {
    console.log('refreshTable_basicSearch :');
    // tslint:disable-next-line:max-line-length
    this.setBasicSearchCount();
    this.searchService.basicSearch(this.basicSearch_perPage,
      this.basicSearch_pageNumber,
      this.basicSearch_sort_on,
      this.basicSearch_sort_by,
      this.basic_search_by,
      this.basic_value_search);
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
    this.searchService.getBsicSearchCount(
      this.basicSearch_perPage,
      this.basicSearch_pageNumber,
      this.basicSearch_sort_on,
      this.basicSearch_sort_by,
      this.basic_search_by,
      this.basic_value_search)
      .subscribe(res => {
        this.basicSearch_total = res['status'];
      });
    // this.refreshTable_basicSearch();
  }

// end : basic search


  public checkBoxSelection(id: string, title: string) {
    console.log("Role Selected : " + id);
    this.selected_role_id = id;
    this.selected_role_name = title;
    this.show_assigned_people();

  }

  public show_assigned_people() {
    this.adminisService.getAssignedPeople(this.selected_role_id).subscribe(res => {
      console.log(res);
      this.assigned_people_array = new Array();
      for (const key1 in res) {
        var adPeople = new AssignedPeopleToRole();
        adPeople.$id = res[key1]['id'];
        adPeople.$created_at = res[key1]["created_at"];
        adPeople.$email = res[key1]["email"];
        adPeople.$phone = res[key1]["phone"];
        adPeople.$name = res[key1]["first_name"] + " " + res[key1]["last_name"];
        this.assigned_people_array.push(adPeople);
      }
    });
  }

  public remove_people() {
    console.log(this.remove_id);
    this.adminisService.remove_people(this.remove_id).subscribe(res => {
      console.log(res);
      if (res['status'] == 1) {
        this.show_assigned_people();
      }
    });
  }

}// class
