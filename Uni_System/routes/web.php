<?php

use App\Http\Controllers\UserController;
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
Route::get('/welcome', function (){ return view("welcome");})->name('welcome');

Route::get('/', [UserController::class, 'login'])->name('login');
Route::post('/post-login', [UserController::class, 'postLogin'])->name('post_login');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/post-register', [UserController::class, 'postRegister'])->name('post_register');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/users', [UserController::class, 'index'])->name('all_users')->middleware('auth');
Route::get('/users/my_profile', [UserController::class, 'my_profile'])->name('my_profile')->middleware('auth');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('edit.password');
Route::put('/users/{user}/update', [UserController::class, 'update'])->name('users.update')->middleware('edit.password');
Route::get('/users/{user}/password_edit', [UserController::class, 'password_edit'])->name('password_edit')->middleware('edit.password');
Route::put('/users/{user}/password_update', [UserController::class, 'password_update'])->name('password_update')->middleware('edit.password');
