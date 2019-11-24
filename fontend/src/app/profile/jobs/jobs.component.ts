import { Component, OnInit } from '@angular/core';
import { JobsService } from './jobs.service';
import { Jobs } from './jobs.model';

@Component({
  selector: 'app-jobs',
  templateUrl: './jobs.component.html',
  styleUrls: ['./jobs.component.scss']
})
export class JobsComponent implements OnInit {

  id: string;
  user_id: string;
  organization_name: string;
  type: string;
  role: string;
  started: string;
  leave: string;
  current_status: string;

  constructor(private jobsService: JobsService) { }

  jobsArray = new Array();
  edit = false;
  updateJob = false;
  jobUpdate: Jobs;
  idUpdate: string;


  ngOnInit() {
    this.setJobs();
  }

  public save() {
    if (this.updateJob) {
      console.log("Jobs Update!");
      this.jobUpdate = this.getJob();
      this.jobUpdate.$id = this.idUpdate;
      this.jobsService.update(this.jobUpdate);
      this.updateJob = false;
    } else {
      this.jobsService.create(this.getJob());
    }
    this.setJobs();
  }

  public editJobs() {
    this.edit = !this.edit;
  }

  public delete(id: string) {
    this.jobsService.delete(id);
    this.setJobs();
  }

  public update(j: Jobs) {
    this.updateJob = true;
    // console.log("E CompEdit : " + e.$degree_name);
    this.setJobForUpdate(j);
    this.idUpdate = j.$id;
  }

  public setJobForUpdate(j: Jobs) {
    this.organization_name = j.$organization_name;
    this.type = j.$type;
    this.role = j.$role;
    this.started = j.$started;
    j.$leave = this.leave;
    j.$current_status = this.current_status;
  }

  public setJobs() {
    this.jobsArray = new Array();
    this.jobsService.getCurrentUserJobs();
    this.jobsService.jobs.subscribe(e => {
      // console.log("Direct : " + e["0"]["id"]);
      for (const key1 in e) {
        // console.log("key1 : " + key1);
        // console.log("value : " + e[key1]["id"]);
        var j1 = new Jobs();
        j1.$id = e[key1]["id"];
        j1.$organization_name = e[key1]["organization_name"];
        j1.$type = e[key1]["type"];
        j1.$role = e[key1]["role"];
        j1.$started = e[key1]["started"];
        j1.$leave = e[key1]["leave"];
        j1.$current_status = e[key1]["current_status"];
        this.jobsArray.push(j1);
      }
    });
  }

  public getJob(): Jobs {
    var job = new Jobs();
    job.$organization_name = this.organization_name;
    job.$type = this.type;
    job.$role = this.role;
    job.$started = this.started;
    job.$leave = this.leave;
    job.$current_status = this.current_status;
    return job;
  }

}//class
