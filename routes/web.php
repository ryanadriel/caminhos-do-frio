<?php

use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\PackageController;
use App\Http\Controllers\Site\ReservationController;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('package/description/{id}', [PackageController::class, 'descriptionPackage'])->name('package.description');


Route::group(['middleware' => ['auth', 'role_and_filament_access']], function () {
    Route::get('/pacote/{package}/reservar', [PackageController::class, 'reserve'])->name('package.reserve');
    Route::post('/pacote/{package}/reservar', [ReservationController::class, 'createReservation'])->name('package.createReservation');
});

