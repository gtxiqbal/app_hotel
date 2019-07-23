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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/kamar/', 'KamarController@index')->name('kamar');
Route::get('/kamar/add/', 'KamarController@add_kamar')->name('add_kamar');
Route::post('/kamar/process/{kamar_kode?}', 'KamarController@process')->name('proc_kamar');
Route::get('/kamar/delete/{kamar_kode}', 'KamarController@delete_kamar')->name('del_kamar');
Route::get('/kamar/edit/{kamar_kode}', 'KamarController@edit_kamar')->name('edit_kamar');

Route::get('/member/', 'MemberController@index')->name('member');
Route::get('/member/add/', 'MemberController@add_member')->name('add_member');
Route::post('/member/process/{id?}', 'MemberController@process')->name('proc_member');
Route::get('/member/delete/{id}', 'MemberController@delete_member')->name('del_member');
Route::get('/member/edit/{id}', 'MemberController@edit_member')->name('edit_member');

Route::get('/userman/', 'UserController@index')->name('userman');
Route::get('/userman/add/', 'UserController@create')->name('add_user');
Route::post('/userman/add/store/', 'UserController@store')->name('store_member');
Route::get('/userman/delete/{id}', 'UserController@destroy')->name('del_user');
Route::get('/userman/edit/{id}', 'UserController@edit')->name('edit_user');
Route::post('/userman/edit/update/', 'UserController@update')->name('update_user');
