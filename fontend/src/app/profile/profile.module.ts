import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { ProfileRoutingModule } from './profile-routing.module';
import { ProfileComponent } from './profile/profile.component';
import { LayoutModule } from '../layout/layout.module';
import { TimelineComponent } from './timeline/timeline.component';
import { BasicComponent } from './basic/basic.component';
import { AboutComponent } from './about/about.component';
import { JobsComponent } from './jobs/jobs.component';
import { EducationComponent } from './education/education.component';
import { NgModel, FormsModule } from '@angular/forms';


@NgModule({
  declarations: [ProfileComponent, TimelineComponent, BasicComponent, AboutComponent, JobsComponent, EducationComponent],
  imports: [
    CommonModule,
    ProfileRoutingModule,
    LayoutModule,
    FormsModule
  ]
})
export class ProfileModule {}
