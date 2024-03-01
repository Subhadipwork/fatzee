<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\front\AuthController as FrontAuthController;
use App\Http\Controllers\front\ChackoutController;
use App\Http\Controllers\front\FrontendController;
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

// Route::get('/', function () {
//     return view('frontend.home.index');
// });

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/manu', [FrontendController::class, 'manu'])->name('manu');

Route::post('/user/register', [FrontAuthController::class, 'register'])->name('user.register');
Route::post('/user/login', [FrontAuthController::class, 'login'])->name('user.login');



Route::post('/addCart', [ChackoutController::class, 'addCart'])->name('addCart');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/user/logout', [FrontAuthController::class, 'logout'])->name('user.logout');
    Route::post('/chackout', [ChackoutController::class, 'chackout'])->name('menu.order');
    Route::post('/chackout/store', [ChackoutController::class, 'store'])->name('menu.order.store');

});



Route::prefix('admin')->name('admin.')->group(function () {


    Route::middleware('web')->group(function () {
        Route::get('', [AuthController::class, 'login'])->name('login');
        Route::post('/login', [AuthController::class, 'authenticate'])->name('login.submit');
    });

    Route::middleware(['web', 'auth'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


        Route::get('/login-form', [AuthController::class, 'login'])->name('login.form');

        Route::resource('category', CategoryController::class);
        Route::post('category/updateStatus', [CategoryController::class, 'updateStatus'])->name('category.updateStatus');

        Route::prefix('product')->name('product.')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('index');
            Route::get('create', [ProductController::class, 'create'])->name('create');
            Route::post('store', [ProductController::class, 'store'])->name('store');
            Route::get('destroy/{id}', [ProductController::class, 'destroy'])->name('destroy');
            Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit');
            Route::put('update/{id}', [ProductController::class, 'update'])->name('update');
            Route::post('updateStatus', [ProductController::class, 'updateStatus'])->name('updateStatus');
            Route::get('removeimage/{id}', [ProductController::class, 'removeimage'])->name('removeimage');

        });

    });
});
