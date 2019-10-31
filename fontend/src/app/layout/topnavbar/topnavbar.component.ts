import { Component, OnInit } from '@angular/core';
import { LoginComponent } from 'src/app/login/login/login.component';

@Component({
  selector: 'app-topnavbar',
  templateUrl: './topnavbar.component.html',
  styleUrls: ['./topnavbar.component.scss']
})
export class TopnavbarComponent implements OnInit {

  loginButton = true;
  loginTry = false;
  loginSuccess = false;
  imageUrl = "assets/dist/img/avatar5.png";

  // login = LoginComponent.loggedIn;
  // static login = true;

  public logginTryToggle() {
    if (this.loginTry) {
      this.loginTry = false;
    } else {
      this.loginTry = true;
    }
  }//logginTryToggle


  public logOut() {
    this.loginSuccess = false;
    this.loginTry = true;
    this.loginButton = true;
  }

  public submit() {
    this.loginSuccess = true;
    this.loginTry = false;
    this.loginButton = false;
  }


  constructor() { }

  ngOnInit() {
  }

}
