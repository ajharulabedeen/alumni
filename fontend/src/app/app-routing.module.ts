import {NgModule} from '@angular/core';
import {Routes, RouterModule} from '@angular/router';
import {HomeComponent} from './home/home.component';
import {AboutComponent} from './public/about/about.component';
import {NewsComponent} from './news/news.component';
import {EventsComponent} from './public/events/events.component';
import {RegisterComponent} from './public/register/register.component';
import {LoginComponent} from './login/login/login.component';
import {AuthComponent} from './auth/auth.component';
import {ProfileComponent} from './profile/profile/profile.component';
import {TimelineComponent} from './profile/timeline/timeline.component';
import {FileUploaderTestComponent} from './file-uploader-test/file-uploader-test.component';
import {PaymentTypeComponent} from './payment/payment-type/payment-type.component';
import {EventManageComponent} from './event/event-manage/event-manage.component';
import {PaymentMobileComponent} from './payment/payment-mobile/payment-mobile.component';
import {SearchComponent} from './search/search.component';
import {EventDetailsComponent} from './event/event-details/event-details.component';
import {EventDetailsUserComponent} from './event/event-details-user/event-details-user.component';
import {NewsPublicComponent} from "./public/news-public/news-public.component";
import {AComponent} from "./test-module/a/a.component";
import {BComponent} from "./test-module/b/b.component";
import {NewsDetailsComponent} from "./public/news-details/news-details.component";
import {AdminComponent} from "./admin/admin/admin.component";
import {AdministrationComponent} from "./admin/administration/administration.component";
import {SuperAdminComponent} from "./super-admin/super-admin/super-admin.component";
import {SuperLogginComponent} from "./super-admin/super-loggin/super-loggin.component";
import {EventsUserComponent} from "./event/events-user/events-user.component";


const routes: Routes = [
  // {path: '', redirectTo: 'login', pathMatch: 'full'}
  // {path: '', redirectTo: 'dashboard', pathMatch: 'full'}//working
  // {path: 'about', redirectTo: 'about', pathMatch: 'full'},//not working
  {path: 'about', component: AboutComponent},
  {path: 'news', component: NewsComponent},
  {path: 'events', component: EventsComponent},
  {path: 'register', component: RegisterComponent},
  {path: 'admin_login', component: LoginComponent},
  {path: 'admin', component: AuthComponent},
  // { path: '', component: HomeComponent },
  {path: 'home', component: HomeComponent},
  {path: 'profile', component: ProfileComponent},
  {path: 'timeline', component: TimelineComponent},
  {path: 'file', component: FileUploaderTestComponent},
  {path: 'admin/payment', component: PaymentTypeComponent},
  {path: 'paymentmobile', component: PaymentMobileComponent},
  {path: 'event', component: EventManageComponent},
  {path: 'event_details/:id', component: EventDetailsComponent},
  {path: 'event_details_user/:id', component: EventDetailsUserComponent},
  {path: 'search', component: SearchComponent},
  {path: 'news', component: NewsComponent},
  {path: 'news_public', component: NewsPublicComponent},
  {path: 'news_details/:news_id', component: NewsDetailsComponent},
  // {path: 'super_admin', component: AdminComponent},
  {path: 'administration', component: AdministrationComponent},
  {path: 'super_loggin', component: SuperLogginComponent},
  {path: 'super_admin', component: SuperAdminComponent},
  {path: 'event_user', component: EventsUserComponent},


  {path: 'a', component: AComponent},
  {path: 'b', component: BComponent},
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule {
}
