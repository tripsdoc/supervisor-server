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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'LoginController@login');

Route::group(['prefix' => 'supervisor'], function () {
    Route::post('import', 'api\SupervisorController@getImport');
    Route::post('export', 'api\SupervisorController@getExport');
    Route::post('connect', 'api\SupervisorController@getConnection');
    Route::post('all', 'api\SupervisorController@getAll');
});
