<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\admin\CatagoryController;
use App\Http\Controllers\admin\StudentController;
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
    return view('welcome');
});

Auth::routes();



// class crud routes//
Route::get('class', [App\Http\Controllers\admin\CatagoryController::class, 'index'])->name('class.index');
Route::get('create/class', [App\Http\Controllers\admin\CatagoryController::class, 'create'])->name('create.class');
Route::post('store/class', [App\Http\Controllers\admin\CatagoryController::class, 'store'])->name('store.class');
Route::get('class/delete/{id}', [App\Http\Controllers\admin\CatagoryController::class, 'delete'])->name('class.delete');
Route::get('class/edit/{id}', [App\Http\Controllers\admin\CatagoryController::class, 'edit'])->name('class.edit');
Route::post('class/update/{id}', [App\Http\Controllers\admin\CatagoryController::class, 'update'])->name('update.class');

/// student routes///
Route::resource('students',StudentController::class);







Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/user/details/{id}', [App\Http\Controllers\HomeController::class, 'details'])->name('user.details');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/store/user', [App\Http\Controllers\HomeController::class, 'store'])->name('store.user');


Route::get('/password/change', [App\Http\Controllers\HomeController::class, 'password_change'])->name('password.change');
Route::post('/update/password', [App\Http\Controllers\HomeController::class, 'update_passwaord'])->name('update_password');
