import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { EventManageComponent } from './event-manage/event-manage.component';
import { LayoutModule } from '../layout/layout.module';
import { FormsModule } from '@angular/forms';



@NgModule({
  declarations: [EventManageComponent],
  imports: [
    CommonModule,
    LayoutModule,
    FormsModule
  ]
})
export class EventModule { }
