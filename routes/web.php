<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/products', ProductController::class);
Route::resource('/posts', PostController::class);
Route::resource('/companies', CompanyController::class);