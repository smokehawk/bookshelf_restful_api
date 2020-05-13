<?php

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('/books')->group(function () {
    Route::get('/list', 'BookApiController@getList');
    Route::get('/{book}', 'BookApiController@get');
    Route::post('/{book}', 'BookApiController@update');
    Route::delete('/{book}', 'BookApiController@delete');
});
