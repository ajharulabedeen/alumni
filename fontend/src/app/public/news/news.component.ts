import {Component, OnInit} from '@angular/core';
import {NewsService} from "./news.service";
import {News} from "./news.model";

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

  dataSaveSucess: boolean;
  news_search_by: string;
  news_value_search: string;
  newsSearch_perPage: string;
  newsSearch_total: string;
  newsSearch_pageNumber: string;
  newsSearch_sort_by: string;
  newsSearch_sort_on: string;

  ngOnInit() {
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

  toggleSuccess() {
    console.log("Toggle Success!");
    this.dataSaveSucess = false;
  }

  setNewsCount() {

  }

  refreshTable_news() {

  }

  newsSearch_previousPage() {

  }

  newsSearch_nextPage() {

  }
}// class
