<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\JWtMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('login', [AuthController::class, 'login']);

Route::prefix('user')->group(function() {
    Route::get('/', [UserController::class, 'index'])->middleware(JWtMiddleware::class);
    Route::get('/{id}', [UserController::class, 'search'])->middleware(JWtMiddleware::class);
    Route::post('/', [UserController::class, 'store'])->middleware(AdminMiddleware::class);
    Route::put('/{id}', [UserController::class, 'update'])->middleware(AdminMiddleware::class);
});