import { Component, OnInit } from '@angular/core';
import { About } from './about.model';
import { AboutService } from './about.service';

@Component({
  selector: 'app-about',
  templateUrl: './about.component.html',
  styleUrls: ['./about.component.scss']
})
export class AboutComponent implements OnInit {

  constructor(private aboutService: AboutService) { }

  id: string;
  user_id: string;
  about_me: string;

  aboutEdit = false;
  aboutExist = false;

  ngOnInit() {

    // this.aboutExist = false;
    // console.log("this.aboutExist  : " + this.aboutExist);
    // this.aboutService.getCurrentUserAbout();
    // this.aboutService.basic.subscribe(b => {
    //   for (const key in b) {
    //     switch (key) {
    //       case "user_id": {
    //         this.user_id = b[key];
    //         break;
    //       }
    //       default: {
    //         // console.log("Invalid choice");
    //         break;
    //       }
    //     }
    //   }//for

    // });
    // console.log("this.basicExist  : " + this.aboutExist);

  }


  public editAbout() {
    this.aboutEdit = !this.aboutEdit;
  }

  public save() {
    this.editAbout();
    this.aboutService.create(this.getAbout());
  }

  public update() {
    this.editAbout();
    this.aboutService.update(this.getAbout());
  }



  /**
   * name
   */
  public getAbout(): About {
    var about = new About();
    about.$about_me = this.about_me;
    return about;
  }


}//class
