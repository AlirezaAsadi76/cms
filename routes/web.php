<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth;
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
    return 'home';
})->name("home");

Route::get('/register',[Auth\RegistrationController::class,'Create'])->name('Register.create');
Route::post('/register',[Auth\RegistrationController::class,'Store'])->name('Register.Store');
Route::get('/login',[Auth\LogingController::class,'Index'])->name('login');
Route::Post('/login',[Auth\LogingController::class,'Authenticate'])->name('login');
Route::middleware('auth')->group(function (){


    Route::post('/logout',Auth\LogoutController::class)->name('logout');
    Route::get('/test',[Auth\RegistrationController::class,'test'])->name('test');
    Route::get('/email/verify',[Auth\EmailVerifyController::class,'Create'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}',[Auth\EmailVerifyController::class,'EmailVerification'])->middleware('signed')->name('verification.verify');
    Route::post('/email/verification-notification',[Auth\EmailVerifyController::class,'ReSend'])->middleware('throttle:6,1')->name('verification.send');

});
