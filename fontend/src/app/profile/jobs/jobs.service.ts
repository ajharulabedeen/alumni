import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';
import { AuthService } from 'src/app/auth/auth.service';
import { Jobs } from './jobs.model';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class JobsService {

  jobs = new BehaviorSubject<any>(null);
  jobArray = new Array();

  constructor(private http: HttpClient, private authService: AuthService) { }

  public getCurrentUserJobs() {
    this.jobs = new BehaviorSubject<any>(null);
    return this.http.post<Jobs>(
      'http://127.0.0.1:8000/api/jobs/getAllJobsByUserId', [], this.authService.getHeader(),
    ).subscribe((e: Jobs) => {
      console.log("One Job : " + e["0"]["organization_name"]);
      this.jobs.next(e);
    });
  }


}//class


