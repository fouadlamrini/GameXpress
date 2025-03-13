<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth;




Route::get('/test', function() {
    return "Hello World!";
});


Route::post('/register', [App\Http\Controllers\API\AuthController::class , "register"]);
Route::post('/login', [App\Http\Controllers\API\AuthController::class , "login"]);
Route::post('/logout', [App\Http\Controllers\API\AuthController::class , "logout"])->middleware('auth:sanctum');
