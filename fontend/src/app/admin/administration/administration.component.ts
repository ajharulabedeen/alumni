import {Component, OnInit} from '@angular/core';
import {AdministrationService} from "./administration.service";
import {Administration} from "./administration.model";
import {Events} from "../../event/event-manage/events.model";

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

  role_show_title: string;
  role_show_detils: string;

  ngOnInit() {
    window.dispatchEvent(new Event('resize'));
    document.body.className = 'hold-transition skin-blue sidebar-mini';
    this.refresh_table();
    this.searchTab(event, 'all_events');
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
      for (const key1 in res) {
        var ad = new Administration();
        ad.$id = res[key1]['id'];
        ad.$title = res[key1]["title"];
        ad.$description = res[key1]["description"];
        this.roles.push(ad);
      }
    });
  }

  public save() {
    var ad = new Administration();
    ad.$title = this.role_title;
    ad.$description = this.role_details;
    console.log("Role Save :");
    this.adminisService.save(ad).subscribe(res => {
      console.log(res);
      if (res > 0) {
        this.refresh_table();
      }
    });
  }

  public delete(id: string) {
    this.adminisService.delete(id).subscribe(res => {
      console.log(res);
      if (res['status'] == 1) {
        this.refresh_table();
      }
    });
  }


}// class
