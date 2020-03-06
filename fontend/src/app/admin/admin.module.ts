import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { AdminRoutingModule } from './admin-routing.module';
import { AdminComponent } from './admin/admin.component';
import {LayoutModule} from "../layout/layout.module";
import {FormsModule} from "@angular/forms";
import { AdministrationComponent } from './administration/administration.component';
import {CKEditorModule} from "ckeditor4-angular";


@NgModule({
  declarations: [AdminComponent, AdministrationComponent],
  imports: [
    CommonModule,
    AdminRoutingModule,
    LayoutModule,
    FormsModule,
    CKEditorModule

  ]
})
export class AdminModule { }
