import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { ProfileRoutingModule } from './profile-routing.module';
import { ProfileComponent } from './profile/profile.component';
import { LayoutModule } from '../layout/layout.module';
import { TimelineComponent } from './timeline/timeline.component';


@NgModule({
  declarations: [ProfileComponent, TimelineComponent],
  imports: [
    CommonModule,
    ProfileRoutingModule,
    LayoutModule
  ]
})
export class ProfileModule {}
