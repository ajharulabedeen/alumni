import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { AboutComponent } from './about/about.component';
import { EventsComponent } from './events/events.component';
import { NewsComponent } from '../news/news.component';
import { RegisterComponent } from './register/register.component';
import { LayoutModule } from '../layout/layout.module';
import { FormsModule } from '@angular/forms';
import { CKEditorModule } from 'ckeditor4-angular';
import { NewsPublicComponent } from './news-public/news-public.component';
import { NewsDetailsComponent } from './news-details/news-details.component';
import {RouterModule} from "@angular/router";



@NgModule({
  declarations: [AboutComponent, EventsComponent, NewsComponent, RegisterComponent, NewsPublicComponent, NewsDetailsComponent],
  imports: [
    CommonModule,
    LayoutModule,
    FormsModule,
    CKEditorModule,
    RouterModule
  ]
})
export class PublicModule { }
