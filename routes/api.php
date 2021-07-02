<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'admin', 'namespace' => '\App\Http\Controllers\API'], function () {
    /* Class Api */
    Route::GET('/classes', 'ClassApiController@index');
    Route::POST('/classes', 'ClassApiController@store');
    Route::PUT('/classes/{classmodel}', 'ClassApiController@update');

    /* Student Api */
    Route::GET('/students/{classmodel?}/', 'StudentApiController@index');
    Route::POST('/students', 'StudentApiController@store');
    Route::PUT('/students/{student}', 'StudentApiController@update');
});
