<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(ClientController::class) -> group( function() {
    Route::get('/', 'index') -> name('home');

    Route::get('test', 'test');

    Route::get('category/{id}','getPostIn');

    Route::post('search','testSearch');

    Route::get('findnews/{id}','newsDetail');
});

Route::get('/test', function() {
    return view('client.result');
});