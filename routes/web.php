<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\isAdmin;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route admin (backend)
Route::group(['prefix' => 'admin', 'middleware' => ['auth',isAdmin::class]], function() {
    Route::get('/', function(){
        return view('admin.index');
    });
    // untuk route admin lainnya
    Route::resource('galery', App\Http\Controllers\GaleryController::class);
    Route::resource('aboute', App\Http\Controllers\AbouteController::class);
    Route::resource('news', App\Http\Controllers\NewsController::class);
    Route::resource('contact', App\Http\Controllers\ContactController::class);

});

// Route user (Frontend)
// Route::get('/',[App\Http\Controllers\FrontController::class,'index'])->name('');

