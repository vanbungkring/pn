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

// Agenda
Route::get('/agenda', 'API\AgendaController@index');
Route::get('/agenda/{id}', 'API\AgendaController@detail');

// Anggota
Route::get('/anggota', 'API\AnggotaController@index');

// Daerah
Route::get('/daerah', 'API\DaerahController@index');
Route::get('/daerah/{id}', 'API\DaerahController@detail');

// Gallery
Route::get('/gallery', 'API\GalleryController@index');
Route::get('/gallery/{id}', 'API\GalleryController@detail');
Route::get('/video/{id}', 'API\GalleryController@video');
Route::get('/videos', 'API\GalleryController@videos');

// Home
Route::get('/home', 'API\HomeController@index');

// Opini
Route::get('/opini', 'API\OpiniController@index');
Route::get('/opini/{id}', 'API\OpiniController@detail');

// Press
Route::get('/press', 'API\PressController@index');
Route::get('/press/{id}', 'API\PressController@detail');

// Read
Route::get('/read', 'API\ReadController@index');
Route::get('/read/{id}', 'API\ReadController@detail');
Route::get('/read_headline/{id}', 'API\ReadController@headline');
Route::get('/read_pages/{id}', 'API\ReadController@pages');
