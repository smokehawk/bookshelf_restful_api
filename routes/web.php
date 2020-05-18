<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::middleware('auth')->group(function () {

    Route::prefix('/books')->group(function () {

        Route::middleware('can:updateContent' || 'can:useAdminPanel')->group(function () {
            Route::post('/', 'BookController@store');
            Route::get('/create', 'BookController@create')->name('books.create');
            Route::put('/{book}', 'BookController@update');
            Route::delete('/{book}', 'BookController@delete');
            Route::get('/{book}/edit', 'BookController@edit')->name('books.edit');

        });

        Route::get('/', 'BookController@index')->name('books.index');
        Route::get('/{book}', 'BookController@show')->name('books.show');

    });

    Route::prefix('/authors')->group(function () {

        Route::middleware('can:updateContent' || 'can:useAdminPanel')->group(function () {
            Route::post('/', 'AuthorController@store');
            Route::get('/create', 'AuthorController@create')->name('authors.create');
            Route::put('/{author}', 'AuthorController@update');
            Route::delete('/{author}', 'AuthorController@delete');
            Route::get('/{author}/edit', 'AuthorController@edit')->name('authors.edit');
        });

        Route::get('/', 'AuthorController@index')->name('authors.index');
        Route::get('/{author}', 'AuthorController@show')->name('authors.show');

    });

    Route::prefix('/users')->middleware('can:useAdminPanel')->group(function () {
        Route::get('/', 'UserController@index')->name('users.index');
        Route::put('/{user}', 'UserController@update');
        Route::delete('/{user}', 'UserController@destroy');
        Route::get('/{user}/edit', 'UserController@edit');
    });

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
