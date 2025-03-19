<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::middleware(['role:admin'])->group(function () {
    Route::get('/testadmin', function () {
     
    })->name('testadmin');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/testuser', function () {
     
    })->name('testuser');

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});