<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\Admin\BrandController;

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
    return view('web.home');
});

//Route::get('login', [Usercontroller::class, 'login'])->name('user.login');
Route::middleware(['auth'])->name('user.')->group(function() {
    Route::get('logout', [Usercontroller::class, 'logout'])->name('logout');
    Route::get('dashboard', [Usercontroller::class, 'dashboard'])->name('dashboard');

    Route::get('profile', [Usercontroller::class, 'profile'])->name('profile');
    Route::post('profile', [Usercontroller::class, 'profileUpdate'])->name('profile.update');

    Route::get('password/change', [Usercontroller::class, 'passwordChange'])->name('password.change');
    Route::post('password/update', [Usercontroller::class, 'passwordUpdate'])->name('password.update');


});



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');




// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';


Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');


Route::middleware(['auth','role:admin'])->group(function() {
 
    Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::get('admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

    Route::get('admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('admin/profile', [AdminController::class, 'profileUpdate'])->name('admin.profile.update');
    
    Route::post('admin/password/update', [AdminController::class, 'passwordUpdate'])->name('admin.password.update');
    
    

});









Route::get('vendor/login', [VendorController::class, 'login'])->name('vendor.login');

Route::middleware(['auth','role:vendor'])->name('vendor.')->group(function() {
    Route::get('vendor/logout', [VendorController::class, 'logout'])->name('logout');

    Route::get('vendor/dashboard', [VendorController::class, 'VendorDashboard'])->name('dashboard');

    Route::get('vendor/profile', [VendorController::class, 'profile'])->name('profile');
    Route::post('vendor/profile', [VendorController::class, 'profileUpdate'])->name('profile.update');
    
    Route::post('vendor/password/update', [VendorController::class, 'passwordUpdate'])->name('password.update');
    
});



Route::middleware(['auth','role:admin'])->prefix('admin')->group(function() {


    // Brand All Route 
    Route::controller(BrandController::class)->name('admin.brand.')->group(function(){
        Route::get('/brand' , 'index')->name('index');
        Route::get('/brand/create' , 'create')->name('create');
        Route::post('/brand/store' , 'store')->name('store');
        Route::get('/brand/edit/{id}' , 'edit')->name('edit');
        Route::post('/brand/update' , 'update')->name('update');
        Route::get('/brand/delete/{id}' , 'delete')->name('delete');

    });


});