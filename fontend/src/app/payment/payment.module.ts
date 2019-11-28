import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { PaymentTypeComponent } from './payment-type/payment-type.component';
import { LayoutModule } from '../layout/layout.module';
import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';



@NgModule({
  declarations: [PaymentTypeComponent],
  imports: [
    CommonModule,
    LayoutModule,
    FormsModule,
    HttpClientModule
  ]
})
export class PaymentModule { }
