<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::controller(ClientController::class) -> group( function() {
    Route::get('/', 'index') -> name('home');

    // Route::get('test', 'test');

    // Route::get('category/{id}','getPostIn');

    // Route::post('search','testSearch');

    // Route::get('findnews/{id}','newsDetail');
});

Route::controller(AdminController::class) -> prefix('admin') -> group( function() {
    Route::get('/'    , 'index');
    Route::get('category' , 'category');
    Route::resource('category', CategoryController::class);
    Route::resource('news', NewsController::class);
});

Route::get('/test', function() {
    return view('client.result');
});