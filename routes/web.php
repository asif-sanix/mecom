<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');


Route::middleware(['auth','role:admin'])->group(function() {
 
    Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::get('admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashobard');

    Route::get('admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('admin/profile', [AdminController::class, 'profileUpdate'])->name('admin.profile.update');
    
    Route::post('admin/password/update', [AdminController::class, 'passwordUpdate'])->name('admin.password.update');
    
    

});









Route::get('vendor/login', [VendorController::class, 'login'])->name('vendor.login');

Route::middleware(['auth','role:vendor'])->name('vendor.')->group(function() {
    Route::get('vendor/logout', [VendorController::class, 'logout'])->name('logout');

    Route::get('vendor/dashboard', [VendorController::class, 'VendorDashboard'])->name('dashobard');

    Route::get('vendor/profile', [VendorController::class, 'profile'])->name('profile');
    Route::post('vendor/profile', [VendorController::class, 'profileUpdate'])->name('profile.update');
    
    Route::post('vendor/password/update', [VendorController::class, 'passwordUpdate'])->name('password.update');
    
});

