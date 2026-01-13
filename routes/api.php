<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MedicalFileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TeacherController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register' , [AuthController::class , 'register']);
Route::post('login' , [AuthController::class , 'login']);
Route::post('logout' , [AuthController::class , 'logout'])->middleware('auth:api');

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

Route::get('teachers' , [TeacherController::class , 'index']);
Route::get('teachers/{teacher}/courses' , [TeacherController::class , 'getAllCourses']);
Route::get('students' , [StudentController::class , 'index']);
Route::get('courses/{course}' , [CourseController::class , 'show']);
Route::post('courses/{course}/sync-students' , [CourseController::class , 'SyncWithStudents']);
Route::post('courses/{teacher}' , [CourseController::class , 'store']);
Route::post('teachers/{teacher}/attach-students' , [TeacherController::class , 'attachTeacherWithStudent']);


Route::group(['middleware' => ['auth:api']] , function(){
    Route::post('posts' , [PostController::class , 'store']);
    Route::put('posts/{post}' , [PostController::class , 'update']);
    Route::delete('posts/{post}' , [PostController::class , 'destroy'])
        ->middleware('can:delete,post');

});

