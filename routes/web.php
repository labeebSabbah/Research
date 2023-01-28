<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VersionController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RejectReasonController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PageController;

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

Route::get('/', [MainController::class, 'index'])->name('home');

Route::get('/page/{page}', [PageController::class, 'show'])->name('page');

Route::get('/contact', [MainController::class, 'contact'])->name('contact');

Route::post('/contact', [MailController::class, 'contact'])->name('contact');

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
            Route::put('/acceptPosts', [PostController::class, 'accept'])->name('admin.post');

            Route::prefix('settings')->group(function () {
                
                Route::get('/social', [SettingsController::class, 'social'])->name('social');
                Route::get('/contact', [SettingsController::class, 'contact'])->name('contact');
                Route::get('/about', [SettingsController::class, 'about'])->name('about');
                Route::get('/share', [SettingsController::class, 'share'])->name('share');
                Route::resource('reasons', RejectReasonController::class)->only([
                    'index', 'store','destroy'
                ]);

                Route::resource('pages', PageController::class);

                Route::put('/reason', [RejectReasonController::class, 'update'])->name('reasons.update');
                Route::post('/add', [SettingsController::class, 'add'])->name('settings.add');
                Route::put('/update', [SettingsController::class, 'update'])->name('settings.update');
                Route::delete('/destroy/{s}', [SettingsController::class, 'destroy'])->name('settings.destroy');

            });

            Route::get('/users', [UserController::class, 'users'])->name('users');

            Route::get('/user/{u}', [UserController::class, 'user'])->name('user');

            Route::get('/version/{c}', [VersionController::class, 'store'])->name('version');

            Route::get('/versions', [VersionController::class, 'index'])->name('versions.index');

            // Route::resource('versions', VersionController::class)->only([
            //     'index', 'store', 'show', 'update', 'destroy'
            // ]);

            // Route::put('/version', [VersionController::class, 'updateData'])->name('version.update');

        });

        Route::middleware('user')->group(function () {

            Route::resource('posts', PostController::class)->except(['show']);

            Route::get('/templates', [CategoryController::class, 'templates'])->name('templates');

            Route::get('/pay/{post}', [PostController::class, 'pay'])->name('pay');

            Route::get('/policy', [PostController::class, 'policy'])->name('policy');

        });

    });

    Route::get('/certificate/{p}', [PostController::class, 'certificate'])->name('certificate');

    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');

    Route::put('/notifications/seen', [NotificationController::class, 'seen'])->name('notifications.seen');
    Route::put('/notifications/read', [NotificationController::class, 'read'])->name('notifications.read');

    Route::put('/{u}/update', [UserController::class, 'update'])->name('user.update');

    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

});