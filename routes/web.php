<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
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


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'home']);

	Route::get('/dashboard',[UserDashboardController::class,'dashboard'])->name('dashboard');

	Route::get('/billing',[UserDashboardController::class,'billing'])->name('billing');

	Route::get('/profile', [UserDashboardController::class,'profile'])->name('profile');

	Route::get('/user-management', [UserDashboardController::class,'userManagement'])->name('user-management');

	Route::get('/tables', [UserDashboardController::class,'tables'])->name('tables');

    Route::get('/static-sign-in', [UserDashboardController::class,'staticSignIn'])->name('sign-in');

    Route::get('/static-sign-up', [UserDashboardController::class,'staticSignUp'])->name('sign-up');

    Route::get('/logout', [SessionsController::class, 'destroy']);

	Route::get('/user-profile', [InfoUserController::class, 'create']);

	Route::post('/user-profile', [InfoUserController::class, 'store']);

    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);

    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login', [SessionsController::class, 'create']);

    Route::post('/session', [SessionsController::class, 'store']);

	Route::get('/login/forgot-password', [ResetController::class, 'create']);

	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);

	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');