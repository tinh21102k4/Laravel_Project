<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\NewsController;
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
    Route::get('/detailNews/{id}' ,  'detailNews')->name('detailNews');
    Route::get('/search' ,  'resultSearch')->name('resultSearch');
    Route::get('/productCate/{id}' ,  'productCate')->name('productCate');
    
});


Route::prefix('admin')
->as('admin.')
->middleware('CheckAdmin')
->controller(AdminController::class)
->group(function (){
    Route::get('/dashboard' ,  'index')->name('dashboard');
    Route::get('/UserManager' ,  'userManager')->name('UserManager');
    Route::get('/SearchUser' ,  'searchUser')->name('SearchUser');
    Route::delete('/userDelete/{id}','deleteUser')->name('deleteUser');

    Route::prefix('category')
    ->as('category.')
    ->controller(CategoryController::class)
    ->group(function(){
        Route::get('/listCategory' ,  'listCategory')->name('ListCategory');
        Route::post('/addCategory' ,  'addCategory')->name('postCategory');
        Route::delete('/categoryDelete/{id}','delCategory')->name('delCategory');
        Route::get('/editCategory/{id}' ,  'detailCategory')->name('detailCategory');
        Route::put('/editCategory/{id}' ,  'editCategory')->name('editCategory');

    });

    Route::prefix('news')
    ->as('news.')
    ->controller(NewsController::class)
    ->group(function(){
        Route::get('/listnews' ,  'listNews')->name('ListNews');
        Route::get('/addnews' ,  'addNews')->name('addNews');
        Route::post('/addnews' ,  'postNews')->name('postNews');
        Route::delete('/newsDelete/{id}','delNews')->name('delNews');
        Route::get('/editnews/{id}' ,  'detailNews')->name('detailNews');
        Route::put('/editnews/{id}' ,  'editNews')->name('editNews');
        Route::post('/newRestore/{id}', 'restore')->name('restore');

    });
});


Route::get('/',[ClientController::class, 'index'])->name('home');

Route::get('/login',[AuthenController::class, 'login'])->name('login');
Route::post('/login',[AuthenController::class, 'postLogin'])->name('postLogin');

Route::get('/register',[AuthenController::class, 'register'])->name('register');
Route::post('/register',[AuthenController::class, 'postRegister'])->name('postRegister');

Route::get('/logout',[AuthenController::class, 'logout'])->name('logout');

Route::get('/forgotpassword',[AuthenController::class, 'forgotpassword'])->name('forgotpassword');
Route::post('/forgotpassword',[AuthenController::class, 'authSendEmail'])->name('authSendEmail');


Route::get('/PasswordChange',[AuthenController::class, 'PasswordChange'])->name('PasswordChange');
Route::get('/notificationDone',[AuthenController::class, 'notificationDone'])->name('notificationDone');
