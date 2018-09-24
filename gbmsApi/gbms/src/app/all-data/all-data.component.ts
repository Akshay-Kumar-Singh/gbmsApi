import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { LoginService } from '../services/login.service';

@Component({
  selector: 'app-all-data',
  templateUrl: './all-data.component.html',
  styleUrls: ['./all-data.component.scss']
})
export class AllDataComponent implements OnInit {

  constructor(public _router: Router, public _loginService: LoginService) { }

  ngOnInit() {
    this.allData();
  }

  allData() {
    // const params: any = {
    //   username: localStorage.getItem('username'),
    //   password: localStorage.getItem('password')
    // };
    this._loginService.allData().subscribe(
      (res: any) => {
          // console.log(params.username);
          // console.log(params.password);
           // this._router.navigate(['register']);
          console.log(res);
        },
        (error: any) => {
          window.alert('No data in database');
        }
      );
    }
  }
