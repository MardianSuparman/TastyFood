<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\isAdmin;
use App\Models\News;

Route::get('/', function () {

    $latestNews = News::orderBy('created_at', 'desc')->first(); // Mengambil berita terbaru
    $otherNews = News::orderBy('created_at', 'desc')->skip(1)->take(4)->get(); // Mengambil 4 berita berikutnya

    return view('HomePage', compact('latestNews','otherNews'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route admin (backend)
Route::group(['prefix' => 'admin', 'middleware' => ['auth', isAdmin::class]], function () {
    Route::get('/', function () {
        return view('admin.index');
    });
    // untuk route admin lainnya
    Route::resource('galery', App\Http\Controllers\GaleryController::class);
    Route::resource('aboute', App\Http\Controllers\AbouteController::class);
    Route::resource('news', App\Http\Controllers\NewsController::class);
    Route::resource('contact', App\Http\Controllers\ContactController::class);
    Route::resource('message', App\Http\Controllers\MessageController::class);
    Route::resource('slider', App\Http\Controllers\SliderController::class);
});

// Route user (Frontend)
Route::get('about', [App\Http\Controllers\FrontController::class, 'about'])->name('about');
Route::get('news', [App\Http\Controllers\FrontController::class, 'news'])->name('news');
Route::get('news/load-more', [App\Http\Controllers\FrontController::class, 'loadNewsMore'])->name('newsLoad');
Route::get('gallery', [App\Http\Controllers\FrontController::class, 'gallery'])->name('gallery');
Route::get('gallery/load-more', [App\Http\Controllers\FrontController::class, 'loadGalleryMore'])->name('gallerysLoad');
Route::get('contact', [App\Http\Controllers\FrontController::class, 'contact'])->name('contact');
Route::post('contact', [App\Http\Controllers\MessageController::class, 'store'])->name('message.store');
Route::get('news/{slug}', [App\Http\Controllers\FrontController::class, 'postNews'])->name('postNews');

