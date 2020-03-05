import {Component, OnInit} from '@angular/core';

@Component({
  selector: 'app-news-public',
  templateUrl: './news-public.component.html',
  styleUrls: ['./news-public.component.scss']
})
export class NewsPublicComponent implements OnInit {

  constructor() {
  }

  ngOnInit() {
    window.dispatchEvent(new Event('resize'));
    document.body.className = 'hold-transition skin-blue sidebar-mini';
  }

}// class
