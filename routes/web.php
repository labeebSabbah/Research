<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
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
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PaymentController;


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

Route::get('/category/{category}', [MainController::class, 'category'])->name('category');

Route::middleware('guest')->group(function () {

    Route::get('/login', [UserController::class, 'show'])->name('login');
    Route::post('/login', [UserController::class, 'login'])->name('login');

    Route::get('/register', [UserController::class, 'create'])->name('register');
    Route::post('/register', [UserController::class, 'store'])->name('register');

    Route::get('/forgot-password', [PasswordController::class, 'forgot'])->name('password.request');

    Route::post('/forgot-password', [PasswordController::class, 'sendEmail'])->name('password.email');

    Route::get('/reset-password', [PasswordController::class, 'resetPassword'])->name('password.form');

    Route::post('/reset-password', [PasswordController::class, 'reset'])->name('password.reset');

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

            Route::get('confirm/{post}', [PaymentController::class, 'index'])->name('pay.confirm');
            Route::get('/pay/{post}', [PaymentController::class, 'pay'])->name('pay');

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

Route::get('/pay/success', [PaymentController::class, 'success'])->name('pay.success');
Route::get('/pay/cancel', [PaymentController::class, 'cancel'])->name('pay.cancel');

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return 'Application cache has been cleared';
});

//Clear route cache:
/*Route::get('/route-cache', function() {
    Artisan::call('route:cache');
    return 'Routes cache has been cleared';
});*/

//Clear config cache:
Route::get('/config-cache', function() {
    Artisan::call('config:cache');
    return 'Config cache has been cleared';
});

// Clear view cache:
Route::get('/view-clear', function() {
   Artisan::call('view:clear');
    return 'View cache has been cleared';
});
