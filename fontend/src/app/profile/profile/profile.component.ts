import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-profile',
  templateUrl: './profile.component.html',
  styleUrls: ['./profile.component.scss']
})
export class ProfileComponent implements OnInit {
  constructor() { }

  photoEdit = false;

  ngOnInit() {
    window.dispatchEvent(new Event('resize'));
    document.body.className = 'hold-transition skin-blue sidebar-mini';
  }

  public editPhoto(){
    this.photoEdit = !this.photoEdit;
  }

  public onFileChanged(event) {
    const file = event.target.files[0];
  }

}//class
