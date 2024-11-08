<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(ClientController::class) -> group( function() {
    Route::get('/', 'index')          -> name('home');

    Route::get('post/{news}', 'post') -> name('post');

    // Route::get('category/{id}','getPostIn');

    // Route::post('search','testSearch');

    // Route::get('findnews/{id}','newsDetail');
});

Route::controller(AdminController::class) -> prefix('admin') -> group( function() {
    Route::get('/'    , 'index');
    Route::resource('category', CategoryController::class);
    Route::resource('news', NewsController::class);
    Route::resource('users', UserController::class);
});

// route đăng ký đăng nhập
Route::middleware('guest') -> group(function() {
    Route::get      ('/register', [RegisteredUserController::class, 'create'  ]) -> name('register');;
    Route::post     ('/register', [RegisteredUserController::class, 'store'   ]);
    Route::get      ('/login',    [SessionsController::class,       'create'  ]) -> name('login');
    Route::post     ('/login',    [SessionsController::class,       'store'   ]);
});

Route::delete   ('/logout', [SessionsController::class, 'destroy' ]) -> middleware('auth');

Route::get('/test', function() {
    return view('client.result');
});