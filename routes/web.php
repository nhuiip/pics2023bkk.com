<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
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
    return to_route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/aboutus', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::resource('news', NewsController::class);
Route::resource('hotels', HotelController::class);
Route::resource('programs', ProgramController::class);
Route::post('/programs/jsondata', [ProgramController::class, 'jsondata'])->name('programs.jsondata');
Route::resource('pricing', PricingController::class);
Route::resource('register', RegisterController::class)->except(['index']);
Route::get('/register/index/{registrantGroupId}/{registrantTypeId}', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register/getassociations', [RegisterController::class, 'getassociations'])->name('register.getassociations');
Route::post('/payment/paylink', [PaymentController::class, 'paylink'])->name('payment.paylink');
Route::post('/payment/result', [PaymentController::class, 'result'])->name('payment.result');
Route::post('/payment/callback', [PaymentController::class, 'callback'])->name('payment.callback');
