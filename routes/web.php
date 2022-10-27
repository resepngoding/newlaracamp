<?php

use App\Http\Controllers\UserController;
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
})->name('welcome');

//Tombol Google Sign ini di klik akan mengarah ke route ini:
Route::get('/sign-in-google', [UserController::class, 'google'])->name('user.login.google');
//email google dipilih utnuk sign in akan mengarah ke route ini :
Route::get('/auth/google/callback', [UserController::class, 'handleProvideCallback'])->name('user.google.callback');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/success-checkout', function () {
    return view('success_checkout');
})->name('success-checkout');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
