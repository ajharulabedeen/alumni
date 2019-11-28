import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { PaymentTypeComponent } from './payment-type/payment-type.component';
import { LayoutModule } from '../layout/layout.module';
import { FormsModule } from '@angular/forms';



@NgModule({
  declarations: [PaymentTypeComponent],
  imports: [
    CommonModule,
    LayoutModule,
    FormsModule
  ]
})
export class PaymentModule { }
