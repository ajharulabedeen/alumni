import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { AdminRoutingModule } from './admin-routing.module';
import { AdminComponent } from './admin/admin.component';
import {LayoutModule} from "../layout/layout.module";
import {FormsModule} from "@angular/forms";


@NgModule({
  declarations: [AdminComponent],
  imports: [
    CommonModule,
    AdminRoutingModule,
    LayoutModule,
    FormsModule
  ]
})
export class AdminModule { }
