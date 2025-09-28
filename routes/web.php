<?php

use App\Http\Controllers\MenuCMSController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoleMenuCMSController;
use App\Models\RoleMenuCMS;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/setup/roles', RoleController::class);
    Route::get('api/roles', [RoleController::class, 'getRoles'])->name('api.roles');
    Route::get('/setup/roles/{id}/confirm-delete', [RoleController::class, 'confirmDelete'])->name('roles.confirm-delete');
    Route::delete('roles/bulk-delete', [RoleController::class, 'bulkDelete'])->name('roles.bulk-delete');
    Route::resource('/setup/menu-cms', MenuCMSController::class);
    Route::get('api/menu-cms', [MenuCMSController::class, 'getMenuCMS'])->name('api.menu-cms');
    Route::get('/setup/menu-cms/{id}/confirm-delete', [MenuCMSController::class, 'confirmDelete'])->name('menu-cms.confirm-delete');
    Route::delete('menu-cms/bulk-delete', [MenuCMSController::class, 'bulkDelete'])->name('menu-cms.bulk-delete');
    Route::get('api/rolemenus', [RoleMenuCMSController::class, 'getRoleMenus'])->name('api.rolemenus');
    Route::resource('/setup/rolemenus', RoleMenuCMSController::class);
});

Route::get('/setup/roles', [RoleController::class, 'index'])
    ->middleware(['auth'])
    ->name('setup.roles');

Route::get('/setup/menu-cms', [MenuCMSController::class, 'index'])
    ->middleware(['auth'])
    ->name('setup.menu-cms');

Route::get('/setup/rolemenus', [RoleMenuCMSController::class, 'index'])
    ->middleware(['auth'])
    ->name('setup.rolemenus');

Route::get('/buttons/text', function () {
    return view('buttons-showcase.text');
})->middleware(['auth'])->name('buttons.text');

Route::get('/buttons/icon', function () {
    return view('buttons-showcase.icon');
})->middleware(['auth'])->name('buttons.icon');

Route::get('/buttons/text-icon', function () {
    return view('buttons-showcase.text-icon');
})->middleware(['auth'])->name('buttons.text-icon');

require __DIR__ . '/auth.php';
