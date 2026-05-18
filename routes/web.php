<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AuthController;

// --- HALAMAN UTAMA ---
Route::get('/', [BookingController::class, 'home'])->name('home');

// --- AUTHENTICATION ---
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'prosesLogin']);

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'prosesRegister']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// --- BOOKING SYSTEM ---
Route::get('/booking', [BookingController::class, 'booking'])->name('booking.view');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

// halaman berhasil qris
Route::get('/booking-success', [BookingController::class, 'success'])->name('booking.success');

// halaman nota cash
Route::get('/nota/{id}', [BookingController::class, 'nota'])->name('booking.nota');

// --- PROFILE ---
Route::get('/profile', [AuthController::class, 'profile'])->name('profile');

// --- TESTIMONIAL ---
Route::post('/testimonial', [AuthController::class, 'storeTestimonial'])->name('testimonial.store');

// --- RIWAYAT PESANAN ---
Route::get('/my-bookings', function() {

// --- PROFILE USER ---
Route::get('/profile', function() {

    if(!session('user_id')) {
        return redirect('/login')->with('error', 'Silakan login dulu.');
    }

    $user = DB::table('customer')
            ->where('id', session('user_id'))
            ->first();

    $bookings = DB::table('pemesanan')
                ->join('paket', 'pemesanan.paket_id', '=', 'paket.id')
                ->where('customer_id', session('user_id'))
                ->select('pemesanan.*', 'paket.nama_paket', 'paket.harga')
                ->orderBy('pemesanan.id', 'desc')
                ->get();

    return view('profile', compact('user', 'bookings'));

})->name('profile');
    if(!session('user_id')) {
        return redirect('/login')->with('error', 'Silakan login dulu.');
    }

    $bookings = DB::table('pemesanan')
                ->join('paket', 'pemesanan.paket_id', '=', 'paket.id')
                ->where('customer_id', session('user_id'))
                ->select('pemesanan.*', 'paket.nama_paket', 'paket.harga')
                ->orderBy('pemesanan.id', 'desc')
                ->get();

    return view('my-bookings', compact('bookings'));

})->name('bookings.index');

// --- ADMIN AREA ---
Route::prefix('admin')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/update-status/{id}/{status}', [AdminController::class, 'updateStatus'])->name('admin.update');

    Route::get('/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');

});