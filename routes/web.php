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
    return view('welcome');
});

Route::prefix('/books')->group(function () {

    Route::get('/', 'BookController@index')->name('books.index');

    Route::post('/', 'BookController@store');

    Route::get('/create', 'BookController@create')->name('books.create');

    Route::get('/{book}', 'BookController@show')->name('books.show');

    Route::put('/{book}', 'BookController@update');

    Route::delete('/{book}', 'BookController@delete');

    Route::get('/{book}/edit', 'BookController@edit')->name('books.edit');

});

Route::prefix('/authors')->group(function () {

    Route::get('/', 'AuthorController@index')->name('authors.index');

    Route::post('/', 'AuthorController@store');

    Route::get('/create', 'AuthorController@create')->name('authors.create');

    Route::get('/{author}', 'AuthorController@show')->name('authors.show');

    Route::put('/{author}', 'AuthorController@update');

    Route::delete('/{author}', 'AuthorController@delete');

    Route::get('/{author}/edit', 'AuthorController@edit')->name('authors.edit');

});
