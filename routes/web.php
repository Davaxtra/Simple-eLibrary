<?php

use App\Http\Controllers\BookController;
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

Route::resource('/book', BookController::class);
Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
Route::post('/book/prodis',[BookController::class,'getProdis']);
Route::get('/book/edit/prodis', [BookController::class,'edit']);
Route::post('/prodis', [BookController::class,'getProdis']);