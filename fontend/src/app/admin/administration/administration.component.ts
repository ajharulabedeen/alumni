import {Component, OnInit} from '@angular/core';
import {AdministrationService} from "./administration.service";
import {Administration} from "./administration.model";

@Component({
  selector: 'app-administration',
  templateUrl: './administration.component.html',
  styleUrls: ['./administration.component.scss']
})
export class AdministrationComponent implements OnInit {

  constructor(private adminisService: AdministrationService) {
  }

  add_new: boolean;

  roles = new Array();
  role_details: string;
  role_title: string;

  ngOnInit() {
    window.dispatchEvent(new Event('resize'));
    document.body.className = 'hold-transition skin-blue sidebar-mini';
    for (var x = 0; x < 10; x++) {
      this.roles.push("Role Role Role Role Role Role Role Role Role : " + x.toString());
    }
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


  public refresh_table() {
    this.roles = new Array();
    this.adminisService.getAll().subscribe(res => {
      console.log(res);
    });
  }

  public save() {
    var ad = new Administration();
    ad.$title = this.role_title;
    ad.$description = this.role_details;
    console.log("Role Save :");
    this.adminisService.save(ad).subscribe(res => {
      console.log(res);
    });
  }


}// class
