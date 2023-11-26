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


// Route::get('/admin/login',[AdminController::class,'login'])->name('adminlogin');
// Route::post('/admin/login',[AdminController::class,'authentication'])->name('adminauth');

Route::middleware(['guest'])->prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('adminlogin');
    Route::post('/authenticate', [AdminController::class, 'authentication'])->name('adminauth');
}); 


Route::middleware(['admin.auth'])->prefix('admin')->group(function () {
    // Your dashboard route
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});



Route::prefix('user')->group(function () {
    Route::get('/register', [UserController::class, 'register']);
    Route::post('/register', [UserController::class, 'registration'])->name('user_registration');
    Route::get('/login', [UserController::class, 'login']);
    Route::post('/login', [UserController::class, 'authentication'])->name('userauth');
    Route::get('/dashboard', [UserController::class, 'dashboard']);
    Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');
});