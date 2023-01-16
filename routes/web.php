<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VersionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('guest')->group(function () {
    
    Route::get('/login', [UserController::class, 'show'])->name('login');
    Route::post('/login', [UserController::class, 'login'])->name('login');

    Route::get('/register', [UserController::class, 'create'])->name('register');
    Route::post('/register', [UserController::class, 'store'])->name('register');

});

Route::middleware('auth')->group(function () {
    
    Route::group(['prefix' => '/dashboard', 'as' => 'dashboard.'], function () {

        Route::get('/', function () {return view('dashboard.index');})->name('index');

        Route::get('/profile', function() {return view('dashboard.profile');})->name('profile');

        Route::middleware('admin')->group(function() {

            Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
            Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
            Route::put('/category', [CategoryController::class, 'update'])->name('categories.update');
            Route::delete('/category/{c}', [CategoryController::class, 'destroy'])->name('categories.destroy');

            Route::get('/checkPosts', [PostController::class, 'show'])->name('admin.posts');
            Route::put('/updatePosts', [PostController::class, 'update'])->name('admin.post');

            Route::prefix('settings')->group(function () {
                
                Route::get('/social', [SettingsController::class, 'social'])->name('social');
                Route::get('/contact', [SettingsController::class, 'contact'])->name('contact');
                Route::get('/about', [SettingsController::class, 'about'])->name('about');

                Route::post('/add', [SettingsController::class, 'add'])->name('settings.add');
                Route::put('/update', [SettingsController::class, 'update'])->name('settings.update');
                Route::delete('/destroy/{s}', [SettingsController::class, 'destroy'])->name('settings.destroy');

            });

            Route::get('/users', [UserController::class, 'users'])->name('users');

            Route::get('/user/{u}', [UserController::class, 'user'])->name('user');

            Route::resource('versions', VersionController::class)->only([
                'index', 'store', 'show', 'update', 'destroy'
            ]);

            Route::put('/version', [VersionController::class, 'updateData'])->name('version.update');

        });

        Route::middleware('user')->group(function () {

            Route::resource('posts', PostController::class)->except([
                'show', 'update'
            ]); 

        });

    });

    Route::put('/{u}/update', [UserController::class, 'update'])->name('user.update');

    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

});