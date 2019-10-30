import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { TopnavbarComponent } from './topnavbar/topnavbar.component';
import { AsidenavbarComponent } from './asidenavbar/asidenavbar.component';
import { FooternavbarComponent } from './footernavbar/footernavbar.component';
import { SettingsnavbarComponent } from './settingsnavbar/settingsnavbar.component';
import { LoadingSpinnerComponent } from './loading-spinner/loading-spinner.component';
import { RouterModule } from '@angular/router';



@NgModule({
  imports: [
    CommonModule,
    RouterModule
  ],
  declarations: [
    TopnavbarComponent,
    AsidenavbarComponent,
    FooternavbarComponent,
    SettingsnavbarComponent,
    LoadingSpinnerComponent
  ],
  exports: [
    TopnavbarComponent,
    AsidenavbarComponent,
    FooternavbarComponent,
    SettingsnavbarComponent,
    LoadingSpinnerComponent
  ]
})
export class LayoutModule { }
