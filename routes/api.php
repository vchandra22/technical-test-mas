<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// route untuk create new users
Route::post('/users', [UserController::class, 'store']);

// route untuk get user berdasarkan id
Route::get('/users/{id}', [UserController::class, 'show']);

// route untuk get all users
Route::get('/users', [UserController::class, 'search']);

// route untuk menhapus users
Route::delete('/users/{id}', [UserController::class, 'destroy']);

//route untuk update data users
Route::put('/users/{id}', [UserController::class, 'update']);
