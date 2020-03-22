import { Component, OnInit } from '@angular/core';
import { TopnavbarComponent } from '../layout/topnavbar/topnavbar.component';
import { AuthService } from '../auth/auth.service';
import { Subscription } from 'rxjs';
@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {

  isAuthenticated = false;
  private userSub: Subscription;
  date : string;
  constructor(private authService: AuthService) { }

  top = new TopnavbarComponent();
  myMsg = 'Hello World!';

  ngOnInit() {
    window.dispatchEvent(new Event('resize'));
    document.body.className = 'hold-transition skin-blue sidebar-mini';
    console.log("Home onInit()");
    this.userSub = this.authService.user.subscribe(user => {
    console.log("Auth Subscriber home:");
      this.isAuthenticated = !!user;
      console.log(!user);
      console.log(!!user);
    });

  }


  // start : for tab in font end.
  public openCity(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName('tabcontent');
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = 'none';
    }
    tablinks = document.getElementsByClassName('tablinks');
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(' active', '');
    }
    document.getElementById(tabName).style.display = 'block';
    evt.currentTarget.className += ' active';
  }
  // end : for tab in font end.



  ngOnDestroy() {
    this.userSub.unsubscribe();
    document.body.className = '';
  }


}//class


// activeHome() {
  //   if (this.home) {
  //     this.home = false;
  //     this.top.logFalse();
  //   }
  //   else if (this.home == false) {
  //     this.home = true;
  //   }
  //   // if(LoginComponent.loggedIn){
  // }//activeHome
