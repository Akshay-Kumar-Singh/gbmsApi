import { Injectable } from '@angular/core';
import { Observable } from '../../../node_modules/rxjs';
import { HttpClient } from '../../../node_modules/@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class LoginService {
  constructor(private _httpClient: HttpClient) {}

  login(params: any): Observable<any> {
    return this._httpClient.post(
      'http://127.0.0.1:8000/api/auth/login',
      params
    );
  }

  allData(): Observable<any> {
    return this._httpClient.get(
      'http://127.0.0.1:8000/api/gbms'
    );
  }
}
