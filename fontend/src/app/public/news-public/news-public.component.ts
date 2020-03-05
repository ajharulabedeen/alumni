import {Component, OnInit} from '@angular/core';
import {NewsNodetails} from "../../news/news-nodetails.model";

@Component({
  selector: 'app-news-public',
  templateUrl: './news-public.component.html',
  styleUrls: ['./news-public.component.scss']
})
export class NewsPublicComponent implements OnInit {

  news_array = new Array();

  constructor() {
  }

  ngOnInit() {
    for (var x = 1; x < 10; x++) {
      var n = new NewsNodetails();
      n.$id = x.toString();
      n.$title = "Title : " + x;
      n.$post_date = "Date  " + x;
      this.news_array.push(n);
    }
    window.dispatchEvent(new Event('resize'));
    document.body.className = 'hold-transition skin-blue sidebar-mini';
  }

}// class
