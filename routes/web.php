<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;


Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/admin', function () {
    return view('admin_side_bar');
})->name('home');
