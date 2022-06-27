<?php

use Illuminate\Support\Facades\Route;

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
});

Auth::routes();


Route::middleware('auth')->group(function () {  
    // Route User
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    // Route Admin
    Route::get('/admin/home', [App\Http\Controllers\AdminDashboardController::class, 'index'])->name('admin-home');
    Route::get('/admin/users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::resource('/admin/users/post', \App\Http\Controllers\UserPostController::class);
    Route::get('/admin/roles', [\App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
    Route::resource('/admin/roles/post', \App\Http\Controllers\RolePostController::class);
    Route::get('/admin/product_categories', [\App\Http\Controllers\ProductCategoryController::class, 'index'])->name('product_categories.index');
    Route::resource('/admin/product_categories/post', \App\Http\Controllers\ProductCategoryPostController::class);
    Route::get('/admin/products', [\App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
    Route::resource('/admin/products/post', \App\Http\Controllers\ProductPostController::class);
    Route::get('/admin/payments', [\App\Http\Controllers\PaymentController::class, 'index'])->name('payments.index');
    Route::resource('/admin/payments/post', \App\Http\Controllers\PaymentPostController::class);
    Route::get('/admin/profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('/admin/profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
// 