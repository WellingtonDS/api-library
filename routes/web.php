<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;


// Rotas com resource para todas as telas.
Route::resource('users', UserController::class);
Route::resource('books', BookController::class);
Route::resource('loans', LoanController::class);
