<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenController;
use App\Http\Controllers\ClientController;
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

Route::prefix('client')
// ->middleware('auth')
->as('client.')
->controller(ClientController::class)
->group(function (){
    Route::get('/home' ,  'index')->name('home');
});
Route::prefix('admin')
->as('admin.')
->middleware('CheckAdmin')
->controller(AdminController::class)
->group(function (){
    Route::get('/dashboard' ,  'index')->name('dashboard');
    Route::get('/Crm' ,  'crm')->name('Crm');
});
Route::get('/login',[AuthenController::class, 'login'])->name('login');
Route::post('/login',[AuthenController::class, 'postLogin'])->name('postLogin');
Route::get('/register',[AuthenController::class, 'register'])->name('register');
Route::post('/register',[AuthenController::class, 'postRegister'])->name('postRegister');
Route::get('/logout',[AuthenController::class, 'logout'])->name('logout');
Route::get('/forgotpassword',[AuthenController::class, 'forgotpassword'])->name('forgotpassword');
Route::get('/PasswordChange',[AuthenController::class, 'PasswordChange'])->name('PasswordChange');
Route::get('/notificationDone',[AuthenController::class, 'notificationDone'])->name('notificationDone');