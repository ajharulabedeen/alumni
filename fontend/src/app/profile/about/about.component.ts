import { Component, OnInit } from '@angular/core';
import { About } from './about.model';
import { AboutService } from './about.service';
import * as ClassicEditor from '@ckeditor/ckeditor5-build-classic';

// import Bold from '@ckeditor/ckeditor5-basic-styles/src/bold';
// import Italic from '@ckeditor/ckeditor5-basic-styles/src/italic';
import Underline from '@ckeditor/ckeditor5-basic-styles/src/underline';
import Strikethrough from '@ckeditor/ckeditor5-basic-styles/src/strikethrough';
import Code from '@ckeditor/ckeditor5-basic-styles/src/code';
import Subscript from '@ckeditor/ckeditor5-basic-styles/src/subscript';
import Superscript from '@ckeditor/ckeditor5-basic-styles/src/superscript';



@Component({
  selector: 'app-about',
  templateUrl: './about.component.html',
  styleUrls: ['./about.component.scss']
})
export class AboutComponent implements OnInit {

  constructor(private aboutService: AboutService) { }

  //---------------------- : CK 5 : ------------------------
  // public Editor = ClassicEditor;
  // ClassicEditor.builtinPlugins = [ FooPlugin, BarPlugin ];

  // public Editor = ClassicEditor
    // .create(document.querySelector('#editor'), {
    //   // plugins: [Strikethrough, Code, Subscript, Superscript],
    //   plugins: [],
    //   toolbar: {
    //     items: []
    //   }
    // })
    // .then(editor => {
    //   console.log('Editor was initialized', editor);
    // })
    // .catch(error => {
    //   console.error(error.stack);
    // });
//---------------------- : CK 5 : ------------------------



  public aboutMeHTML = "";

  id: string;
  user_id: string;
  about_me: string;

  aboutEdit = false;
  aboutExist = false;

  ngOnInit() {

    this.aboutExist = false;
    console.log("this.aboutExist  : " + this.aboutExist);
    this.aboutService.getCurrentUserAbout();
    this.aboutService.about.subscribe(a => {
      for (const key in a) {
        switch (key) {
          case "id": {
            this.id = a[key];
            break;
          }
          case "user_id": {
            this.user_id = a[key];
            break;
          }
          case "about_me": {
            this.about_me = a[key];
            break;
          }
          default: {
            // console.log("Invalid choice");
            break;
          }
        }
      }//for

    });
    console.log("this.basicExist  : " + this.aboutExist);
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
