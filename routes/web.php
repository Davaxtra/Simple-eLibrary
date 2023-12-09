<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Models\Listing;
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
    return view('pages.welcome');
})->name('welcome');

// Login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');

// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');


Route::middleware(['auth'])->group(function () {
    Route::resource('/book', BookController::class);
    Route::get('/book', [BookController::class, 'search'])->name('book');
    Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
    Route::post('/book/prodis', [BookController::class, 'getProdis']);
    Route::get('/book/edit/prodis', [BookController::class, 'edit']);
    Route::post('/prodis', [BookController::class, 'getProdis']);
});
