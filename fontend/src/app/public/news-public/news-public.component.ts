import {Component, OnInit} from '@angular/core';
import {NewsNodetails} from "../../news/news-nodetails.model";
import {Router} from "@angular/router";
import {NewsService} from "../../news/news.service";

@Component({
  selector: 'app-news-public',
  templateUrl: './news-public.component.html',
  styleUrls: ['./news-public.component.scss']
})
export class NewsPublicComponent implements OnInit {

  news_array = new Array();
  public newsSearch_perPage: number;
  public newsSearch_pageNumber: number;
  public newsSearch_sort_on: string;
  public newsSearch_sort_by: string;
  public news_search_by: string;
  public news_value_search: string;
  private newsSearch_total: string;

  constructor(private newsService: NewsService, private router: Router) {
  }

  ngOnInit() {
    this.newsSearch_perPage = 10;
    this.newsSearch_pageNumber = 1;
    this.newsSearch_sort_on = "post_date";
    this.newsSearch_sort_by = "ASC";
    this.news_search_by = 'title';
    this.news_value_search = '';


    //dummy
    for (var x = 1; x < 11; x++) {
      var n = new NewsNodetails();
      n.$id = x.toString();
      n.$title = "TitleTitleTitleTitleTitleTitle : " + x;
      n.$post_date = "Date  " + x;
      this.news_array.push(n);
    }


    window.dispatchEvent(new Event('resize'));
    document.body.className = 'hold-transition skin-blue sidebar-mini';
  }

  public refreshTable_news() {
    // if (this.active_search) {
    //   this.news_value_search = '';
    // }

    var per_page = this.newsSearch_perPage;
    var sort_by = this.newsSearch_sort_by;//>ASC/DESC
    var sort_on = this.newsSearch_sort_on;
    var column_name = this.news_search_by;//column name
    var key = this.news_value_search;
    var pageNumber = this.newsSearch_pageNumber;
    // $per_page, $sort_by, $sort_on, $column_name, $key
    this.setTotal();
    this.newsService.getAllNews(per_page, sort_by, sort_on, column_name, key, pageNumber).subscribe(res => {
      // console.log(res[0]);
      this.news_array = new Array();
      for (const key1 in res) {
        var news = res[key1];
        this.news_array.push(news);
      }
    });
    // console.log(this.news_array);
  }

  public newsSearch_previousPage() {
    if (this.newsSearch_pageNumber > 1) {
      this.newsSearch_pageNumber -= 1;
      this.refreshTable_news();
    }
  }

  public newsSearch_nextPage() {
    if (this.newsSearch_pageNumber < (this.newsSearch_total / this.newsSearch_perPage)) {
      this.newsSearch_pageNumber += 1;
      this.refreshTable_news();
    }
  }

  public setTotal() {
    // if (this.active_search == false) {
    //   this.news_value_search = '';
    // }
    var column_name = this.news_search_by;//column name
    var key = this.news_value_search;
    var pageNumber = this.newsSearch_pageNumber;
    this.newsService.count(column_name, key).subscribe(res => {
      console.log(res);
      this.newsSearch_total = res['data'];
    });

    // if (this.active_search) {
    //   this.newsService.count_search(this.event_search_by, this.event_value_search).subscribe(res => {
    //     // console.log(res);
    //     this.eventSearch_total = res['data'];
    //   });
    //
    // } else {
    //   this.eService.couunt_all().subscribe(res => {
    //     // console.log(res);
    //     this.eventSearch_total = res['data'];
    //   });
    // }
  }


}// class
