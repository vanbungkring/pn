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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//News
Route::get('/berita/{daerah?}','ReadController@index')->name('news');
Route::get('/read/{id}/{year}/{month}/{date}/{slug}', 'ReadController@detail');
Route::get('/headline/{id}/{year}/{month}/{date}/{slug}', 'ReadController@headline');
Route::get('/pages/{slug}', 'ReadController@pages');
Route::get('/tags/{tag}','ReadController@tags')->name('tags');


//Opini
Route::get('/opinion','OpiniController@index')->name('opini');
Route::get('/opini/{id}/{year}/{month}/{date}/{slug}', 'OpiniController@detail');

//Agenda
Route::get('/agendas','AgendaController@index')->name('agenda');
Route::get('/agenda/{id}/{year}/{month}/{date}/{slug}', 'AgendaController@detail');

//Covid
Route::get('/covid','CovidController@index')->name('covid');
Route::get('/covid/{id}/{year}/{month}/{date}/{slug}', 'CovidController@detail');

//Gallery
Route::get('/gallery','GalleryController@index')->name('foto');
Route::get('/view/{id}/{year}/{month}/{date}/{slug}', 'GalleryController@detail');
Route::get('/video/{id}', 'GalleryController@video');
Route::get('/videos', 'GalleryController@videos')->name('video');


//Press
Route::get('/list-sosok','PressController@index')->name('sosok');
Route::get('/sosok/{id}/{year}/{month}/{date}/{slug}', 'PressController@detail');

//Daerah
Route::get('/dpw','DaerahController@index')->name('daerah');
Route::get('/daerah/{id}','DaerahController@detail');


//Anggota
Route::get('/anggota','AnggotaController@index')->name('anggota');

//Search
Route::get('/search','HomeController@search')->name('search');

Route::domain('{account}.nasdem.com')->group(function () {    

});
