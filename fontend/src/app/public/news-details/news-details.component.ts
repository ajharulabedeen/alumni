import {Component, OnInit} from '@angular/core';
import {ActivatedRoute} from "@angular/router";
import {AuthService} from "../../auth/auth.service";
import {HttpClient} from "@angular/common/http";

@Component({
  selector: 'app-news-details',
  templateUrl: './news-details.component.html',
  styleUrls: ['./news-details.component.scss']
})
export class NewsDetailsComponent implements OnInit {
  private id: string;

  news_title: string;
  news_details: string;
  news_note: string;

  constructor(private activeRoute: ActivatedRoute,
              private http: HttpClient,
              private authService: AuthService) {
  }

  ngOnInit() {
    this.id = this.activeRoute.snapshot.params['news_id'];
    this.getOneNews(this.id);
  }

  public getOneNews(id: string) {
    this.http.post(
      'http://127.0.0.1:8000/news/findOne',
      {
        'id': id
      },
      this.authService.getHeader()
    ).subscribe(res => {
      console.log(res);
      this.news_title = res['title'];
      this.news_details = res['description'];
    });
  }

}// class
