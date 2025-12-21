<?php

use Illuminate\Http\Request;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MedicalFileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/students', [StudentController::class, 'store']);
Route::get('/students/{student}', [StudentController::class, 'show']);

Route::post('/medical-files', [MedicalFileController::class, 'store']);
Route::get('/students/{student}/medical-file', [MedicalFileController::class, 'getByStudent']);
Route::put('/medical-files/{medicalFile}', [MedicalFileController::class, 'update']);


Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/categories/{category}', [CategoryController::class, 'show']);
Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);

Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/{product}', [ProductController::class, 'show']);