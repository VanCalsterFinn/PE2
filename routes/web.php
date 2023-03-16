<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
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
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices');

Route::get('/invoices/create', [InvoiceController::class, 'create'])->name('create');
Route::post('/invoices/create', [InvoiceController::class, 'store']);



Route::get('/', function () {
    return view('');
});

