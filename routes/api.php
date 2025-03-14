<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\V1\Admin\ProductController;
use App\Http\Controllers\CategoryController;


Route::get('/test', function() {
    return "Hello World!";
});


Route::post('/register', [AuthController::class , "register"]);
Route::post('/login', [AuthController::class , "login"]);
Route::post('/logout', [AuthController::class , "logout"])->middleware('auth:sanctum');


Route::middleware(['auth:sanctum'])->prefix('v1/admin')->group(function() {
    Route::apiResource('products', ProductController::class);
    // Route::get('products', [ProductController::class, 'index']);
    Route::apiResource('categories', CategoryController::class);
});