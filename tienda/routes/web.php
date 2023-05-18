<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::resource('/artistas', 'App\Http\Controllers\ArtistasController');
Route::resource('/albumes', 'App\Http\Controllers\AlbumesController');

Route::middleware(['auth'])->group(function () {
    Route::get('/inicio/api', 'App\Http\Controllers\InicioController@api')->name('inicio.api');
    Route::get('/favoritos-pdf', 'App\Http\Controllers\FavoritosController@pdf')->name('pdf');
    Route::post('/favoritos-storeList', 'App\Http\Controllers\FavoritosController@storeList')->name('storeList');
    Route::delete('/favoritos-destroyList/{id}', 'App\Http\Controllers\FavoritosController@destroyList')->name('destroyList');


    Route::resource('/artistasAdmin', 'App\Http\Controllers\ArtistasAdminController');
    Route::resource('/albumesAdmin', 'App\Http\Controllers\AlbumesAdminController');
    Route::resource('/perfil', 'App\Http\Controllers\UserController');
    Route::resource('/AllUser', 'App\Http\Controllers\AllUserController');
    Route::resource('/favoritos', 'App\Http\Controllers\FavoritosController');
    Route::resource('/', 'App\Http\Controllers\InicioController');
    Route::resource('/inicio', 'App\Http\Controllers\InicioController');
    
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\InicioController::class, 'index'])->name('home');
