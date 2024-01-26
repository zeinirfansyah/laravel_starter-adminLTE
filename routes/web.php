<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserDataController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//    all user routes
Route::get('/customer', [HomeController::class, 'index'])->name('customer.home');

// Admin and manager routes
Route::middleware(['auth', 'user-access:admin,manager'])->group(function(){
    Route::get('/admin', [HomeController::class, 'adminHome'])->name('admin.home');
});

// Manager only
Route::middleware(['auth', 'user-access:manager'])->group(function(){
    Route::prefix('/manager/users')->group(function () {
        Route::get('/', [UserDataController::class, 'index'])->name('users.index');
        Route::get('/create', [UserDataController::class, 'createUser'])->name('users.create');
        Route::post('/create', [UserDataController::class, 'storeUser'])->name('users.store');
        Route::get('/{id}/update', [UserDataController::class, 'updateUser'])->name('users.update');
        Route::put('/{id}/update', [UserDataController::class, 'editUser'])->name('users.edit');
        Route::delete('/{id}/delete', [UserDataController::class, 'deleteUser'])->name('users.delete');
      
    });
});
