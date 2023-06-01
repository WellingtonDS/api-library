<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;

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
    return view('welcome');
});

// Rotas para CRUD de usuários
Route::resource('users', UserController::class);

// Rotas para CRUD de livros
Route::resource('books', BookController::class);

// Rotas para CRUD de empréstimos
Route::resource('loans', LoanController::class);
