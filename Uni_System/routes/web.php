<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentShellController;
use Illuminate\Support\Facades\Auth;
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
//Route::get('/welcome', function (){ return view("welcome");})->name('welcome');
Route::get('/',
    function () {
        if (Auth::user()) {
            return redirect()->action([UserController::class, 'my_profile']);
        } else {
        return view('user.login');
        }
    })->name('welcome');
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

Route::get('/lectures', [LectureController::class, 'index'])->name('all_lectures')->middleware('auth');

Route::get('/courses', [CourseController::class, 'index'])->name('all_courses')->middleware('auth');
Route::get('/my_courses', [CourseController::class, 'my_courses'])->name('my_courses')->middleware('auth');
Route::get('/courses/create', [CourseController::class, 'create'])->name('create.course')->middleware('auth');
Route::post('/courses/save', [CourseController::class, 'save'])->name('save.course')->middleware('auth');

Route::get('/student_shells', [StudentShellController::class, 'index'])->name('all_student_shells')->middleware('auth');
Route::get('/my_student_shells', [StudentShellController::class, 'my_student_shells'])->name('my_student_shells')->middleware('auth');

Route::get('/about',function () { return view('about');})->name('about');

Route::get('/login',function () { return view('user.login');})->name('login');
