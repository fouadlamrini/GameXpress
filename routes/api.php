<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;


Route::get('/test', function() {
    return "Hello World!";
});


Route::post('/register', [App\Http\Controllers\API\AuthController::class , "register"]);
Route::post('/login', [App\Http\Controllers\API\AuthController::class , "login"]);
Route::post('/logout', [App\Http\Controllers\API\AuthController::class , "logout"])->middleware('auth:sanctum');


Route::middleware(['auth:sanctum'])->prefix('V1/admin')->group(function() {
    Route::apiResource('products', ProductController::class);
    Route::apiResource('categories', CategoryController::class);
});