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
route::resource('/',              'App\Http\Controllers\InicioController');
route::resource('/inicio',        'App\Http\Controllers\InicioController');
route::resource('/artistas',      'App\Http\Controllers\ArtistasController');
route::resource('/artistasAdmin', 'App\Http\Controllers\ArtistasAdminController');
route::resource('/albumes',       'App\Http\Controllers\AlbumesController');
route::resource('/albumesAdmin',  'App\Http\Controllers\AlbumesAdminController');