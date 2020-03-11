import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { SuperAdminComponent } from './super-admin/super-admin.component';
import { SuperLogginComponent } from './super-loggin/super-loggin.component';



@NgModule({
  declarations: [SuperAdminComponent, SuperLogginComponent],
  imports: [
    CommonModule
  ]
})
export class SuperAdminModule { }
