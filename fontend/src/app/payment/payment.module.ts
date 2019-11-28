import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { PaymentTypeComponent } from './payment-type/payment-type.component';
import { LayoutModule } from '../layout/layout.module';



@NgModule({
  declarations: [PaymentTypeComponent],
  imports: [
    CommonModule,
    LayoutModule
  ]
})
export class PaymentModule { }
