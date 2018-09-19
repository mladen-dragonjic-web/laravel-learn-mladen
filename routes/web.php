<?php

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

/* USERS ROUTES - START */
Route::get('/', 'IndexController@index')->name('homepage');

Route::any('/users/login', 'UsersController@login')->name('users-login');

Route::get('/users/logout', 'UsersController@logout')->name('users-logout');

Route::get('/users/welcome', 'UsersController@welcome')->name('users-welcome');

Route::any('/users/create', 'UsersController@create')->name('users-create');

Route::get('/users', 'UsersController@index')->name('users');

Route::any('/users/edit/{user}', 'UsersController@edit')->name('users-edit');

Route::get('/users/delete/{user}', 'UsersController@delete')->name('users-delete');

Route::any('/users/change-password/{user}', 'UsersController@changePassword')->name('users-change-password');
/* USERS ROUTES - END */

/* PAGES ROUTES - START */
Route::get('/pages', 'PagesController@index')->name('pages');

Route::any('/pages/create', 'PagesController@create')->name('pages-create');

Route::any('/pages/edit/{page}', 'PagesController@edit')->name('pages-edit');

/* PAGES ROUTES - END */



