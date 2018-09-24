<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware('auth:api')->post('/login', function (Request $request) {
//     return $request->login();
// });

Route::get('gbms', 'userdataController@index');

Route::get('gbms/{id}', 'userdataController@show');

Route::post('gbms', 'userdataController@store');

Route::put('gbms/{id}', 'userdataController@store');

Route::delete('gbms/{id}', 'userdataController@destroy');

// Route::post('login', 'AuthController@login');
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});