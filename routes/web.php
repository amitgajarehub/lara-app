<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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
    return view('home');
});
Route::get('/users', [UserController::class, 'getUsers']);

// Banner 
Route::get('/', [BannerController::class, 'Banner']);
Route::get('/banner', [BannerController::class, 'index']);
Route::post('/banner/add', [BannerController::class, 'add']);
Route::view('/banner/add', 'admin.banners.add');
Route::get('/admin/banner/delete/{id}', [BannerController::class, 'delete']);
Route::get('/admin/banner/edit/{id}', [BannerController::class, 'show']);
Route::post('/admin/banner/edit', [BannerController::class, 'update']);

// Category 
Route::get('/category', [CategoryController::class, 'index']);
Route::get('admin/category/create', [CategoryController::class, 'create']);
Route::post('admin/category/create', [CategoryController::class, 'store']);
Route::get('/admin/category/delete/{id}', [CategoryController::class, 'destroy']);
Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit']);
Route::post('/admin/category/edit', [CategoryController::class, 'update']);


// Route::get('/admin', function () {
//     return view('layout.dashboard');
// });

Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


/* Product */

Route::resource('product', ProductController::class);


