import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
declare var $;
@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {

  static  loggedIn = false;


  constructor(
    private router: Router
  ) { }

  // getLoginInfo(){
  //   return loggedIn;
  // }

  ngOnInit() {
    document.body.className = 'hold-transition login-page';
    $(() => {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
  }

  login() {
    console.log("Loggin.");
    this.router.navigate(['dashboard']);
  }

}//class
