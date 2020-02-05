import {Component, OnInit} from '@angular/core';
import {SearchService} from './search.service';

@Component({
  selector: 'app-search',
  templateUrl: './search.component.html',
  styleUrls: ['./search.component.scss']
})
export class SearchComponent implements OnInit {


  constructor(private searchService: SearchService) {
  }

  ngOnInit() {

    //basic
    this.basic_search_by = 'student_id';
    this.basicSearch_sort_on = 'dept';
    this.basicSearch_perPage = 10;
    this.basicSearch_sort_by = 'ASC';
    this.basicSearch_pageNumber = 1;
    //basic

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

  //error : suggested to declear as class instance
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
    this.setBasicSearchCount();
    this.searchService.basicSearch(this.basicSearch_perPage, this.basicSearch_pageNumber, this.basicSearch_sort_on, this.basicSearch_sort_by, this.basic_search_by, this.basic_value_search);
  }

  public basicSearch_previousPage() {

  }

  public basicSearch_nextPage() {

  }

  public setBasicSearchCount() {
    this.searchService.getBsicSearchCount(this.basicSearch_perPage, this.basicSearch_pageNumber, this.basicSearch_sort_on, this.basicSearch_sort_by, this.basic_search_by, this.basic_value_search)
      .subscribe( res => {
        this.basicSearch_total = res['status'];
      });
  }

// end : basic search


}//class
