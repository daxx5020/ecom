<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});


// admin routes


Route::middleware(['guest'])->prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('adminlogin');
    Route::get('/register', [AdminController::class, 'register'])->name('adminregister');
    Route::post('/register', [AdminController::class, 'store'])->name('adminstore');
    Route::post('/authenticate', [AdminController::class, 'authentication'])->name('adminauth');
});

Route::middleware(['admin.auth'])->prefix('admin')->group(function () {
    // Your dashboard route
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/category', [AdminController::class, 'category'])->name('admin.category');
    Route::post('/category', [AdminController::class, 'addCategory'])->name('admin.addcategory');
    Route::get('/addproduct/{id?}', [AdminController::class, 'addproduct'])->name('admin.addproduct');
    Route::post('/addproduct', [AdminController::class, 'storeproduct'])->name('admin.storeproduct');
    Route::post('/updateproduct/{id}', [AdminController::class, 'updateproduct'])->name('admin.updateproduct');
    Route::get('/viewproduct', [AdminController::class, 'viewproduct'])->name('admin.viewproduct');
    Route::delete('/delete/{id}', [AdminController::class, 'deleteproduct'])->name('admin.deleteproduct');    
});



// user routes

Route::middleware(['guest'])->prefix('user')->group(function () {
    Route::get('/register', [UserController::class, 'register']);
    Route::post('/register', [UserController::class, 'registration'])->name('user_registration');
    Route::get('/login', [UserController::class, 'login']);
    Route::post('/login', [UserController::class, 'authentication'])->name('userauth');
});

Route::middleware(['user.auth'])->prefix('user')->group(function () {
    // Your dashboard route
    Route::get('/dashboard', [UserController::class, 'dashboard']);
    Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');
});