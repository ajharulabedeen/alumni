import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { AboutComponent } from './about/about.component';
import { EventsComponent } from './events/events.component';
import { NewsComponent } from './news/news.component';
import { RegisterComponent } from './register/register.component';
import { LayoutModule } from '../layout/layout.module';



@NgModule({
  declarations: [AboutComponent, EventsComponent, NewsComponent, RegisterComponent],
  imports: [
    CommonModule,
    LayoutModule
  ]
})
export class PublicModule { }
