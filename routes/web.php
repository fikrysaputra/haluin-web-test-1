<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\MenuCMSController;
use App\Http\Controllers\RoleMenuCMSController;
use App\Http\Controllers\UserCMSController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\UserTicketController;
use App\Http\Controllers\UserTicketHistoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/* Profil */
Route::get('/tentang-kami', function () {
    return view('profil.tentangkami');
});

/* Layanan */
Route::get('/desain-grafis', fn() => view('layanan.desaingrafis.desaingrafis'));
Route::get('/desain-interior', fn() => view('layanan.DesainInterior.desaininterior'));
Route::get('/teknologi-digital', fn() => view('layanan.digitaltekno.digitaltekno'));
Route::get('/katalog', fn() => view('katalog'));

/* Admin */
Route::get('/admin-home', fn() => view('admin.home'));

Route::middleware('auth')->get('/dashboard', [UserTicketController::class, 'myTickets'])->name('dashboard');

/* CMS + ADMIN PROTECTED ROUTES */
Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Role
    Route::resource('/setup/roles', RoleController::class);
    Route::get('api/roles', [RoleController::class, 'getRoles'])->name('api.roles');
    Route::delete('roles/bulk-delete', [RoleController::class, 'bulkDelete'])->name('roles.bulk-delete');

    // Menu CMS
    Route::resource('/setup/menu-cms', MenuCMSController::class);
    Route::get('api/menu-cms', [MenuCMSController::class, 'getMenuCMS'])->name('api.menu-cms');
    Route::delete('menu-cms/bulk-delete', [MenuCMSController::class, 'bulkDelete'])->name('menu-cms.bulk-delete');

    // Role Menu
    Route::resource('/setup/rolemenus', RoleMenuCMSController::class);
    Route::get('api/rolemenus', [RoleMenuCMSController::class, 'getRoleMenus'])->name('api.rolemenus');

    // User CMS
    Route::resource('/setup/user-cms', UserCMSController::class);
    Route::get('api/user-cms', [UserCMSController::class, 'getUserCMS'])->name('api.user-cms');
    Route::delete('user-cms/bulk-delete', [UserCMSController::class, 'bulkDelete'])->name('user-cms.bulk-delete');
});

/* Halaman Event untuk User & Guest */
Route::get('/event-menarik', [EventController::class, 'index'])->name('eventorganizer.index');
Route::get('/event/{id}', [EventController::class, 'show'])->name('event.show');



/* =====================================================
   USER BUY TICKET (LOGGED IN)
===================================================== */
Route::middleware('auth')->group(function () {

    // User membeli tiket → ke halaman checkout
    Route::post('/user/tickets/buy/{ticketId}', [UserTicketController::class, 'buy'])
    ->name('user.ticket.buy');

    // USER BELI SEKARANG, menuju halaman konfirmasi pembayaran
    Route::post('/user/ticket/buy/{id}', [App\Http\Controllers\UserTicketController::class, 'confirm'])
        ->name('user.ticket.buy');

    // Setelah konfirmasi, simpan & proses (nanti bisa dipakai midtrans)
    Route::post('/user/ticket/store', [App\Http\Controllers\UserTicketController::class, 'store'])
        ->name('user_ticket.store');

    // Add to cart untuk user
    Route::post('/carts/add', [CartsController::class, 'add'])
        ->name('carts.add');

    // Lihat Cart
    Route::get('/carts', [CartsController::class, 'index'])
        ->name('carts.index');

    // Checkout setelah cart
    Route::post('/carts/checkout', [CartsController::class, 'checkout'])
        ->name('carts.checkout');

    // Riwayat pembelian
    Route::get('/user/tickets/history', [UserTicketHistoryController::class, 'index'])
        ->name('user.tickets.history');

    Route::post('/ticket/confirm', [UserTicketController::class, 'confirm'])
        ->name('ticket.confirm');

});


/* =====================================================
   GUEST BUY TICKET
===================================================== */

// Jika guest klik beli, arahkan ke form guest
Route::get('/belitiketguestform', function () {
    return view('akun.guestform');
})->name('guest.buy.form');

// Guest submit pembelian
Route::post('/guest/tickets/buy', [UserTicketController::class, 'guestBuy'])
    ->name('guest.tickets.buy');

// Guest add to cart, diarahkan ke login
Route::get('/guest/carts', function () {
    return redirect('/login')->with('error', 'Anda harus login untuk menambahkan ke keranjang.');
})->name('guest.carts.redirect');

// Route untuk menghapus akun
Route::delete('/account/delete', [AuthenticatedSessionController::class, 'destroy'])->name('account.delete');


/* Auth Routes */
require __DIR__ . '/auth.php';
