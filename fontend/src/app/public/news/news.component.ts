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
}// class
