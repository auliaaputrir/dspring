<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;

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
// Route::get('/', function () {
//     return view('welcome');
// });


Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'admin'])
    ->group(function ()
        {
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

            Route::get('/kamar', [RoomController::class, 'index'])->name('kamar');
            Route::get('/kamar-create', [RoomController::class, 'create'])->name('kamar-create');
            Route::post('/kamar-store', [RoomController::class, 'store'])->name('kamar-store');
            Route::get('/kamar-delete/{id}', [RoomController::class, 'hapus'])->name('kamar-delete');
            Route::get('/kamar-edit/{id}', [RoomController::class, 'edit'])->name('kamar-edit');
            Route::patch('/kamar-update/{id}', [RoomController::class, 'update'])->name('kamar-update');
        }
    
    );

Route::prefix('penyewa')
    ->namespace('Penyewa')
    ->middleware(['auth', 'penyewa'])
    ->group(function ()
    {
        Route::get('/', function(){
            return "halo";
        })->name('dashboard');
    }
        
);


