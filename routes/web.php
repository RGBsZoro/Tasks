<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home' , [HomeController::class , 'home']);
Route::get('products' , [ProductController::class , 'index'])
    ->name('products.index');
Route::get('products/create' , [ProductController::class , 'create'])
    ->name('products.create');
Route::post('products' , [ProductController::class , 'store'])
    ->name('products.store');
Route::get('products/search' , [ProductController::class , 'search'])
    ->name('products.search');

Route::get('dashboard' , [DashboardController::class , 'dashboard'])
    ->name('dashboard');
Route::get('users' , [DashboardController::class , 'users'])
    ->name('users');

Route::get('locale/{lang}',function($lang){
    session(['locale' => $lang]);
    return redirect()->back();
})->name('locale');