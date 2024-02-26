<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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
    $user = auth()->user();
    return view('welcome', compact('user'));
});

Auth::routes();

Route::middleware(['auth'])->group(function(){
    
    //    all user routes
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    

    // Admin and superadmin routes
    Route::middleware(['auth', 'user-access:admin,superadmin'])->group(function(){
        Route::prefix('admin')->group(function () {
            Route::get('/', [HomeController::class, 'adminHome'])->name('admin.home');
            Route::get('/profile', [ProfileController::class, 'index'])->name('profile.show');
            Route::get('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
            Route::put('/profile/update', [ProfileController::class, 'editProfile'])->name('profile.edit');
        });
    });

    // Superadmin only
    Route::middleware(['auth', 'user-access:superadmin'])->group(function(){
        Route::prefix('/superadmin/users')->group(function () {
            Route::get('/', [UserDataController::class, 'index'])->name('users.index');
            Route::get('/create', [UserDataController::class, 'createUser'])->name('users.create');
            Route::post('/create', [UserDataController::class, 'storeUser'])->name('users.store');
            Route::get('/{id}/update', [UserDataController::class, 'updateUser'])->name('users.update');
            Route::put('/{id}/update', [UserDataController::class, 'editUser'])->name('users.edit');
            Route::delete('/{id}/delete', [UserDataController::class, 'deleteUser'])->name('users.delete');
            Route::get('/{id}/detail', [UserDataController::class, 'detailUser'])->name('users.detail');
        
        });
    });
});