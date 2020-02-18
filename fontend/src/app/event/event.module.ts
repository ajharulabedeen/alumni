import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { EventManageComponent } from './event-manage/event-manage.component';
import { LayoutModule } from '../layout/layout.module';
import { FormsModule } from '@angular/forms';
import { CKEditorModule } from 'ckeditor4-angular';
import { EventDetailsComponent } from './event-details/event-details.component';



@NgModule({
  declarations: [EventManageComponent, EventDetailsComponent],
  imports: [
    CommonModule,
    LayoutModule,
    FormsModule,
    CKEditorModule
  ]
})
export class EventModule { }
