import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { LoginService } from '../services/login.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {
  // aks = 'konichiwa';
  constructor(private _router: Router, private _loginService: LoginService) {}

  ngOnInit() {}

  login(form) {
    // form.user;
    // debugger;
    // this._router.navigate(['register']);
    const params: any = {
      username: (<HTMLInputElement>document.getElementById('username')).value,
      password: (<HTMLInputElement>document.getElementById('password')).value
    };
    // this.Auth.getUserDetails(email, password).subscribe(data => {
    console.log(params);
    this._loginService.login(params).subscribe(
    (res: any) => {
      localStorage.setItem('username', params.username);
      localStorage.setItem('password', params.password);
         console.log(params.username);
         console.log(params.password);
        localStorage.setItem('loggedin', 'true');
        // localStorage.setItem('username', res->username);
         this._router.navigate(['/alldata']);
        console.log(res);
      },
      (error: any) => {
        window.alert('Invalid user');
      }
    );
  }
}
