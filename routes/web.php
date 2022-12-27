<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Penyewa\PaymentController;
use App\Http\Controllers\Penyewa\ReservationController;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/email', function(){
    return view('mail.email');
});


Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'admin'])
    ->group(function ()
        {
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard-admin');Route::get('/', [DashboardController::class, 'index'])->name('dashboard-admin');

            Route::get('/kamar', [RoomController::class, 'index'])->name('kamar');
            Route::get('/kamar-create', [RoomController::class, 'create'])->name('kamar-create');
            Route::post('/kamar-store', [RoomController::class, 'store'])->name('kamar-store');
            Route::get('/kamar-delete/{id}', [RoomController::class, 'hapus'])->name('kamar-delete');
            Route::get('/kamar-edit/{id}', [RoomController::class, 'edit'])->name('kamar-edit');
            Route::patch('/kamar-update/{id}', [RoomController::class, 'update'])->name('kamar-update');

            Route::get('/reservasi', [App\Http\Controllers\Admin\ReservationController::class, 'index'])->name('reservasi');
            Route::get('/reservasi-edit/{id}', [App\Http\Controllers\Admin\ReservationController::class, 'edit'])->name('reservasi-edit');
            Route::patch('/reservasi-update/{id}', [App\Http\Controllers\Admin\ReservationController::class, 'update'])->name('reservasi-update');
        }
    
    );

Route::prefix('penyewa')
    ->namespace('Penyewa')
    ->middleware(['auth', 'penyewa'])
    ->group(function ()
    {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard-penyewa');

        Route::get('/reservasi', [ReservationController::class, 'index'])->name('reservasi-penyewa');
        Route::post('/reservasi-store', [ReservationController::class, 'store'])->name('reservasi-store');
        // Route::get('/reservasi-sukses', [ReservationController::class, 'sukses'])->name('reservasi-sukses');

        Route::get('/pembayaran/{id}', [PaymentController::class, 'index'])->name('pembayaran');
        Route::post('/pembayaran-create/{id}', [PaymentController::class, 'store'])->name('pembayaran-create'); #function store bukan create
    }
        
);


