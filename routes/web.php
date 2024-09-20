<?php

use Illuminate\Support\Facades\Route;


Route::resource('books', BookController::class);
Route::resource('categories', CategoryController::class);

Route::get('/', function () {
    return view('welcome');
});
