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

Route::get('/tentang-kami', function () {
    return view('profil.tentangkami');
});

/*Layanan*/
Route::get('/desain-grafis', function () {
    return view('layanan.desaingrafis.desaingrafis');
});

Route::get('/desain-interior', function () {
    return view('layanan.DesainInterior.desaininterior');
});

Route::get('/teknologi-digital', function () {
    return view('layanan.digitaltekno.digitaltekno');
});

Route::get('/katalog', function () {
    return view('katalog');
});

Route::get('/struktur-organisasi', function () {
    return view('profil.strukturorganisasi');
});

/*admin*/
Route::get('/admin-home', function () {
    return view('admin.home');
});