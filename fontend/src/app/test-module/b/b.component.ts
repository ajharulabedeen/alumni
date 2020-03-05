import { Component, OnInit } from '@angular/core';
import {BehaviorSubject} from "rxjs/internal/BehaviorSubject";

@Component({
  selector: 'app-b',
  templateUrl: './b.component.html',
  styleUrls: ['./b.component.scss']
})
export class BComponent implements OnInit {

  constructor() { }

  show = new BehaviorSubject<boolean>(null);

  ngOnInit() {
  }

  buttonClicked(){

  }

}
