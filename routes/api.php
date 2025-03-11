<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::get('/test', function() {
    return "Hello World!";
});


Route::post('/register', [App\Http\Controllers\API\Auth::class , "register"]);


// Route::get('/TestAuthentificated', [App\Http\Controllers\API\Auth::class , function ()
// {
//     return "Authentificated!";
// }])->middleware('auth:sanctum');
