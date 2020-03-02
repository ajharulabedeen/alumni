import {Component, OnInit} from '@angular/core';
import {NewsService} from "./news.service";
import {News} from "./news.model";
import {Events} from "../../event/event-manage/events.model";

@Component({
  selector: 'app-news',
  templateUrl: './news.component.html',
  styleUrls: ['./news.component.scss']
})
export class NewsComponent implements OnInit {

  constructor(private newsService: NewsService) {
  }

  title: string;
  description: string;
  notes: string;
  delete_id: string;
  edit_id: string;

  dataSaveSucess: boolean;
  news_search_by: string;
  news_value_search: string;
  newsSearch_perPage: number;
  newsSearch_total: number;
  newsSearch_pageNumber: number;
  newsSearch_sort_by: string;
  newsSearch_sort_on: string;
  active_search: boolean;

  news_array = new Array();

  ngOnInit() {
    this.newsSearch_perPage = 10;
    this.newsSearch_pageNumber = 1;
    this.newsSearch_sort_on = "post_date";
    this.newsSearch_sort_by = "ASC";
    this.news_search_by = 'title';
    this.news_value_search = '';

    window.dispatchEvent(new Event('resize'));
    document.body.className = 'hold-transition skin-blue sidebar-mini';
  }

  public save_news() {
    var news = new News();
    news.$title = this.title;
    news.$description = this.description;
    news.$notes = this.description;
    this.newsService.saveNews(news).subscribe(res => {
      if (res > 0) {
        console.log("Data Save Success!");
        this.dataSaveSucess = true;
      }
    });
  }

  public toggleSuccess() {
    console.log("Toggle Success!");
    this.dataSaveSucess = false;
  }

  public setNewsCount() {

  }

  public refreshTable_news() {
    if (this.active_search) {
      this.news_value_search = '';
    }
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

  public delete() {
    // console.log("ID : " + this.delete_id);
    this.newsService.delete(this.delete_id).subscribe(data => {
      console.log(data);
      if (data['status'] == '1') {
        this.refreshTable_news();
      }
    });
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
    if (this.active_search) {
      this.news_value_search = '';
    }
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
