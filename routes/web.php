<?php

use App\Http\Controllers\Admin\PageController;
use App\Http\Livewire\AdminsControlPage;
use App\Http\Livewire\BooksControlPage;
use App\Http\Livewire\UsersControlPage;
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

Route::group(["middleware" => "seen:user"], function () {
    Route::get('/', "App\Http\Controllers\HomeController@index")->name('home');

    Route::namespace('App\Http\Controllers\User')->group(function() {
        Route::get('/store', 'ProductController@index')->name('store');
        Route::get('/view/{book}', 'ProductController@show')->name('view');
    });
});

Route::group(['as' => 'user.', 'namespace' => 'App\Http\Controllers\User'], function () {
    Route::middleware(['guest:user'])->group(function() {
        Route::get('/login', 'AuthController@loginPage')->name('login.page');
        Route::get('/register', 'AuthController@registerPage')->name('register.page');

        Route::post('/login', 'AuthController@login')->name('login');
        Route::post('/register', 'AuthController@register')->name('register');
    });

    Route::middleware(['auth:user'])->group(function() {
        Route::post('/buy/{book}', 'ProductController@buy')->name('buy');
        Route::post('/logout', 'AuthController@logout')->name('logout');
    });
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::namespace ("App\Http\Controllers\Admin")->group(function () {
        Route::post('/logout', 'AuthController@logout')->name('logout');

        Route::middleware(['guest:admin'])->group(function () {
            Route::get('/login', 'AuthController@loginPage')->name('login.page');
            Route::post('/login', 'AuthController@login')->name('login');
        });
    });

    Route::middleware(['auth:admin', 'seen:admin'])->group(function () {
        Route::get('/', [PageController::class, 'index'])->name('home');
        Route::get('/admins', AdminsControlPage::class)->name('admins');
        Route::get('/users', UsersControlPage::class)->name('users');
        Route::get('/books', BooksControlPage::class)->name('books');
    });
});
