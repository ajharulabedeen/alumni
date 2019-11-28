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

  constructor(private http: HttpClient, private authService: AuthService) { }

  create(job: Jobs) {
    console.log("Create : ");
    console.log(job);
    this.http.post(
      'http://127.0.0.1:8000/api/jobs/create', job, this.authService.getHeader()
    ).subscribe((res: Response) => {
      console.log(res);
    });
  }

  update(job: Jobs) {
    console.log("Update : ");
    console.log(job);
    this.http.post(
      'http://127.0.0.1:8000/api/jobs/update', job, this.authService.getHeader()
    ).subscribe((res: Response) => {
      console.log(res);
    });
  }

  public delete(id: string) {
    this.http.post(
      'http://127.0.0.1:8000/api/jobs/deleteOne', { 'id': id }, this.authService.getHeader()
    ).subscribe((res: Response) => {
      console.log(res);
    });
  }

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


