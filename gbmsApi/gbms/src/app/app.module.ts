import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule } from '@angular/forms';

import { AppComponent } from './app.component';
import { LoginComponent } from './login/login.component';
import { RouterModule, Routes } from '@angular/router';
import { RegisterComponent } from './register/register.component';
import { NotfoundComponent } from './notfound/notfound.component';
import { LoginService } from './services/login.service';
import { AllDataComponent } from './all-data/all-data.component';

const route: Routes = [
  {
    path: '',
    component: LoginComponent
  },
  {
    path: 'register',
    component: RegisterComponent
  },
  {
    path: 'alldata',
    component: AllDataComponent
  },
  {
    path: 'notfound',
    component: NotfoundComponent
  },
  {
    path: '**',
    redirectTo: 'notfound'
  }
];

@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    RegisterComponent,
    NotfoundComponent,
    AllDataComponent
  ],
  imports: [BrowserModule, HttpClientModule, RouterModule.forRoot(route), FormsModule],
  providers: [LoginService],
  bootstrap: [AppComponent]
})
export class AppModule {}
