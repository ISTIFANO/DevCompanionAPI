<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\HackathonController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\ThemeController;
use App\Http\Middleware\CheckRole;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::middleware(CheckRole::class)->group(function () {
    Route::get('/testadmin', function () {
   return ['admin'=>' this is Admin  '];
    })->name('testadmin');
});

// Route::middleware(['auth'])->group(function () {
//     Route::get('/testuser', function () {
//      //jdiq
//     }
// }
// );



    Route::post('/hackathon/create',[HackathonController::class,'store']);
    Route::post('/hackathon/show',[HackathonController::class,'show']);
    Route::post('/hackathon/edit',[HackathonController::class,'edit']);
    Route::post('/hackathon/destroy',[HackathonController::class,'destroy']);

    Route::post('/equipe/create',[EquipeController::class,'store']);
    Route::post('/equipe/show',[EquipeController::class,'show']);
    Route::post('/equipe/edit',[EquipeController::class,'edit']);
    Route::post('/equipe/destroy',[EquipeController::class,'destroy']);



    Route::post('/rule/create',[RuleController::class,'store']);
    Route::post('/rule/show',[RuleController::class,'show']);
    Route::post('/rule/edit',[RuleController::class,'edit']);
    Route::post('/rule/destroy',[RuleController::class,'destroy']);
    
    Route::post('/theme/create',[ThemeController::class,'store']);
    Route::post('/theme/show',[ThemeController::class,'show']);
    Route::post('/theme/edit',[ThemeController::class,'edit']);
    Route::post('/theme/destroy',[ThemeController::class,'destroy']);


Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});

