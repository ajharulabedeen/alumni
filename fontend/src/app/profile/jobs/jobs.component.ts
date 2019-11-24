import { Component, OnInit } from '@angular/core';
import { JobsService } from './jobs.service';
import { Jobs } from './jobs.model';

@Component({
  selector: 'app-jobs',
  templateUrl: './jobs.component.html',
  styleUrls: ['./jobs.component.scss']
})
export class JobsComponent implements OnInit {


  constructor(private jobsService: JobsService) { }

  jobsArray = new Array();
  edit = false;
  updateJob = false;
  jobUpdate: Jobs;
  idUpdate: string;


  ngOnInit() {
    this.setJobs();
  }

  public save(){

  }

  public editJobs() {
    this.edit = !this.edit;
  }

  public update() {

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

}//class
