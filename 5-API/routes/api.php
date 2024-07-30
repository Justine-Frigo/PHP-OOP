<?php

use app\Controllers\Login;
use app\Core\Route;
use app\Middleware\JwtMiddleware;
use app\Controllers\PostController;
use app\Controllers\PostSeederController;
use app\Controllers\Register;

Route::get('/', function () {
    return json_encode('Hello world!');
});


Route::middleware([JwtMiddleware::class])->group(function () {
    Route::get('/posts', [PostController::class, 'index']);
    Route::post('/posts', [PostController::class, 'store']);
    Route::put('/posts/{id}', [PostController::class, 'update']);
    Route::delete('/posts/{id}', [PostController::class, 'delete']);
    Route::get('/seed-posts', [PostSeederController::class, 'seed']);
    Route::post('/auth/logout', [Login::class,'logout']);
});

Route::prefix('/auth')->group(function () {
    Route::post('/register', [Register::class, 'register']);
    Route::post('/login', [Login::class, 'login']);
});
