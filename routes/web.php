<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentsController;
use Illuminate\Support\Facades\Route;

Route::controller(ClientController::class) -> group( function() {
    Route::get('/', 'index')               -> name('home');
    Route::get('search',  'search_news')   -> name('search_news');
});


// 
Route::get('category/{category:title}', [CategoryController::class,  'show']) -> name('category.show');
Route::get('new/{news:slug}',           [NewsController::class,      'show']) -> name('news.show');


// Admin crud
Route::middleware('auth') -> prefix('admin') -> group( function() {
    Route::get('/', [AdminController::class,'index']) -> name('dashboard');
    
    Route::resource('category', CategoryController::class) -> except('show');
    Route::resource('news',     NewsController::class)     -> except('show');
    Route::resource('users',    UserController::class);
    Route::resource('comments', CommentsController::class);
});


// Đăng ký đăng nhập
Route::middleware('guest') -> group(function() {
    Route::get   ('/register', [RegisteredUserController::class, 'create'  ]) -> name('register');;
    Route::post  ('/register', [RegisteredUserController::class, 'store'   ]);
    Route::get   ('/login',    [SessionsController::class,       'create'  ]) -> name('login');
    Route::post  ('/login',    [SessionsController::class,       'store'   ]);
});

// Đăng xuất
Route::delete   ('/logout', [SessionsController::class, 'destroy' ]) -> middleware('auth');


Route::middleware('auth') -> group(function() {
    Route::post('new/{news}/comments',          [CommentsController::class, 'store']) 
        -> name('comments.store');

    Route::post('new/{news}/{comment}/reply',   [CommentsController::class, 'reply']) 
        -> name('comments.reply');

    Route::put('new/{news}/{comment}',   [CommentsController::class, 'update']) 
        -> name('comments.update');

    Route::put('new/{news}/{comment}/reply',   [CommentsController::class, 'updateReply']) 
        -> name('comments.reply.update');
}); 

// Test
Route::get('/test', function() {
    return view('client.test');
});