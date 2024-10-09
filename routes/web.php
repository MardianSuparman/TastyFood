<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\isAdmin;

Route::get('/', function () {
    return view('HomePage');
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
    Route::put('news', [App\Http\Controllers\NewsController::class, 'update'])->name('update.news');
    Route::resource('contact', App\Http\Controllers\ContactController::class);

});

// Route user (Frontend)
Route::get('about',[App\Http\Controllers\FrontController::class,'about'])->name('about');
Route::get('news',[App\Http\Controllers\FrontController::class,'news'])->name('news');
Route::get('gallery',[App\Http\Controllers\FrontController::class,'gallery'])->name('gallery');
Route::get('contact',[App\Http\Controllers\FrontController::class,'contact'])->name('contact');
Route::post('contact',[App\Http\Controllers\MessageController::class,'store'])->name('message.store');
