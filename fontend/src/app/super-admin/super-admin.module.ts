import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { SuperAdminComponent } from './super-admin/super-admin.component';
import { SuperLogginComponent } from './super-loggin/super-loggin.component';
import {FormsModule} from "@angular/forms";
import { CKEditorModule } from '@ckeditor/ckeditor5-angular';


@NgModule({
  declarations: [SuperAdminComponent, SuperLogginComponent],
  imports: [
    CommonModule,
    FormsModule,
    CKEditorModule
  ]
})
export class SuperAdminModule { }
