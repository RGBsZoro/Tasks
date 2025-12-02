<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('products')->group(function(){
    Route::get('' , [ProductController::class , 'index']);
    Route::get('/{product}' , [ProductController::class , 'show']);
    Route::post('' , [ProductController::class , 'store']);
    Route::put('/{product}' , [ProductController::class , 'update']);
    Route::delete('/{product}' , [ProductController::class , 'destroy']);
});