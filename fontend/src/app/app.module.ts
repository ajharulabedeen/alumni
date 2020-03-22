import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { LoginModule } from './login/login.module';
import { DashboardModule } from './dashboard/dashboard.module';
import { HomeComponent } from './home/home.component';
import { LayoutModule } from './layout/layout.module';
import {FormsModule, ReactiveFormsModule, NgModel} from '@angular/forms';
import { PublicModule } from './public/public.module';
import { AuthComponent } from './auth/auth.component';
import { HttpClientModule } from '@angular/common/http';
import { AuthService } from './auth/auth.service';
import { ProfileComponent } from './profile/profile/profile.component';
import { ProfileModule } from './profile/profile.module';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { MatSliderModule } from '@angular/material/slider';
import { MatInputModule, MatPaginatorModule, MatProgressSpinnerModule,
         MatSortModule, MatTableModule, MatButtonModule } from "@angular/material";
import { DataTableComponent } from './data-table/data-table.component';
import { FileUploaderTestComponent } from './file-uploader-test/file-uploader-test.component';
import { PaymentModule } from './payment/payment.module';
import { EventModule } from './event/event.module';
import { CKEditorModule } from '@ckeditor/ckeditor5-angular';
import { SearchComponent } from './search/search.component';
import {TestModuleModule} from "./test-module/test-module.module";
import {AdminModule} from "./admin/admin.module";
import {SuperAdminComponent} from "./super-admin/super-admin/super-admin.component";
import {SuperAdminModule} from "./super-admin/super-admin.module";
import {News} from "./news/news.model";
import {NewsPublicComponent} from "./public/news-public/news-public.component";


@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    AuthComponent,
    DataTableComponent,
    FileUploaderTestComponent,
    SearchComponent,
    // AuthService
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    LoginModule,
    DashboardModule,
    LayoutModule,
    FormsModule,
    PublicModule,
    ReactiveFormsModule,
    HttpClientModule,
    ProfileModule,
    BrowserAnimationsModule,
    MatSliderModule,
    MatInputModule,
    MatTableModule,
    MatPaginatorModule,
    MatSortModule,
    MatProgressSpinnerModule,
    MatButtonModule,
    MatInputModule,
    PaymentModule,
    EventModule,
    CKEditorModule,
    TestModuleModule,
    AdminModule,
    SuperAdminModule,
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
