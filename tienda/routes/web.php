<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::resource('/', 'App\Http\Controllers\InicioController');
Route::resource('/inicio', 'App\Http\Controllers\InicioController');
Route::resource('/artistas', 'App\Http\Controllers\ArtistasController');
Route::resource('/albumes', 'App\Http\Controllers\AlbumesController');


Route::resource('/artistasAdmin', 'App\Http\Controllers\ArtistasAdminController');
Route::resource('/albumesAdmin', 'App\Http\Controllers\AlbumesAdminController');


Route::middleware(['auth'])->group(function () {

    Route::resource('/perfil', 'App\Http\Controllers\UserController');
    Route::resource('/AllUser', 'App\Http\Controllers\AllUserController');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\InicioController::class, 'index'])->name('home');
