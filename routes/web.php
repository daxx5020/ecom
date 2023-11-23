<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::middleware(['guest'])->group(function () {
    Route::get('/admin/login', [AdminController::class, 'login'])->name('adminlogin');
    Route::post('/admin/authenticate', [AdminController::class, 'authentication'])->name('adminauth');
});


Route::middleware(['admin.auth'])->group(function () {
    // Your dashboard route
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
});