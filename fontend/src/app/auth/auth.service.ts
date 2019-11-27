import { Injectable } from '@angular/core';
import { HttpClient, HttpErrorResponse, HttpHeaders } from '@angular/common/http';
import { throwError, BehaviorSubject } from 'rxjs';
import { catchError, tap, subscribeOn } from 'rxjs/operators';
import { User } from './user.model';


export interface AuthResponseData {
  access_token: string;
  token_type: string;
  expires_in: number;
  user: string;
}

@Injectable({ providedIn: 'root' })
export class AuthService {
  user = new BehaviorSubject<User>(null);
  currentUser = this.user.asObservable();
  token: string;

  constructor(private http: HttpClient) { }

  signup(email: string, password: string) {
    return this.http
      .post<AuthResponseData>(
        'http://127.0.0.1:8000/api/signup',
        {
          name: "Test Name",
          email: email,
          password: password,
          password_confirmation: password
        }
      )
      .pipe(
        // catchError(this.handleError),//not working; problem: unable to distinguish between login and singuperror.
        catchError(errorRes => {
          let errorMessage = 'An unknown error occurred!';
          if (errorRes.error.errors.email[0].match("The email has already been taken.")) {
            errorMessage = 'This email already taken!';
            console.log("ERR : " + errorRes.error.errors.email[0]);
            errorMessage = errorRes.error.errors.email[0];
            return throwError(errorMessage);
          }
          return throwError(errorMessage);
        }),
        tap(resData => {
          return this.handleAuthentication(
            resData.user,
            resData.token_type,
            resData.user,
            resData.expires_in);
        })
      );
  }//sing up.


  login(email: string, password: string) {
    return this.http
      .post<AuthResponseData>(
        'http://127.0.0.1:8000/api/login',
        {
          email: email,
          password: password,
        }
      )
      .pipe(
        // catchError(this.handleError),
        catchError(errorRes => {
          let errorMessage = 'An unknown error occurred!';
          if (errorRes.error.error.match("Email or Password does not exist.")) {
            errorMessage = 'This email already taken!';
            // console.log("ERR : " + errorRes.error.errors.email[0]);
            errorMessage = errorRes.error.error;
            return throwError(errorMessage);
          }
          return throwError(errorMessage);
        }),
        tap(resData => {
          this.token = resData.access_token;
          return this.handleAuthentication(
            resData.user,
            resData.token_type,
            resData.access_token,
            resData.expires_in);
        })
      );
  }//loggin

  //not working; problem: unable to distinguish between login and singuperror.
  private handleError(errorRes: HttpErrorResponse) {
    let errorMessage = 'An unknown error occurred!';
    if (errorRes.error.error.match("Email or Password does not exist.")) {
      errorMessage = 'This email already taken!';
      // console.log("ERR : " + errorRes.error.errors.email[0]);
      errorMessage = errorRes.error.error;
      return throwError(errorMessage);
    }
    if (errorRes.error.errors.email[0].match("The email has already been taken.")) {
      errorMessage = 'This email already taken!';
      console.log("ERR : " + errorRes.error.errors.email[0]);
      errorMessage = errorRes.error.errors.email[0];
      return throwError(errorMessage);
    }
    return throwError(errorMessage);
  }//handleError



  private handleAuthentication(
    email: string,
    userId: string,
    token: string,
    expiresIn: number
  ) {
    console.log("New User Created!");
    const expirationDate = new Date(new Date().getTime() + expiresIn * 1000);
    const user = new User(email, userId, token, expirationDate);
    this.user.next(user);
    console.log("New User Created : next");
  }

  public getHeader() {
    var token: string;
    token = "bearer" + this.getToken();
    let headers = new HttpHeaders({
      // 'Content-Type': 'application/json',
      'Authorization': token
    });
    let options = { headers: headers };
    return options;
  }
  public getHeaderFile() {
    var token: string;
    token = "bearer" + this.getToken();
    let headers = new HttpHeaders({
      'Authorization': token
    });
    let options = {
      headers: headers,
      responseType: 'blob',
      param : []
    };
    return options;
  }

  public getToken() {
    return this.token;
    // return this.user.asObservable;
  }

  public getCurrentUser() {
    return this.currentUser;
  }

  public removeToken() {
    this.token = '';
  }


}//main class
