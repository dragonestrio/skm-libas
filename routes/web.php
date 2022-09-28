<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginHistoryController;
use App\Http\Controllers\MhsController;
use App\Http\Controllers\QuestionsCategoryController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UsersController;
use App\Models\Users;
use Illuminate\Support\Facades\Redirect;
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

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('guest');
Route::get('register', [HomeController::class, 'register_index'])->name('register')->middleware('guest');
Route::get('login', [HomeController::class, 'login_index'])->name('login')->middleware('guest');
Route::get('logout', [UsersController::class, 'logout'])->name('logout');
Route::post('register', [UsersController::class, 'register'])->middleware('guest');
Route::post('login', [UsersController::class, 'login'])->middleware('guest');
Route::post('logout', [UsersController::class, 'logout']);

Route::get('profile', [UsersController::class, 'profile_index'])->name('profile')->middleware('auth');
Route::put('profile', [UsersController::class, 'profile'])->middleware('auth');
Route::get('users/{user}/change_password', [UsersController::class, 'change_passwd_index'])->middleware('auth');
Route::put('users/{user}/change_password', [UsersController::class, 'change_passwd'])->middleware('auth');

// dashboard
Route::get('dashboard', [HomeController::class, 'dashboard'])->middleware('auth');
// 

// users
Route::resource('users', UsersController::class)->middleware('superadmin');
//

// unit fokus
Route::resource('units', UnitController::class)->except('show')->middleware('superadmin');
// Route::resource('units', UnitController::class)->except('show', 'store', 'update', 'destroy')->middleware('superadmin');
// api
// Route::get(date('d_m_Y_', time()) . 'units', [UnitController::class, 'show'])->middleware('superadmin');
// Route::get(date('d_m_Y_', time()) . 'units/{unit}', [UnitController::class, 'show'])->middleware('superadmin');
// Route::post(date('d_m_Y_', time()) . 'units', [UnitController::class, 'store'])->middleware('superadmin');
// Route::put(date('d_m_Y_', time()) . 'units/{unit}', [UnitController::class, 'update'])->middleware('superadmin');
// Route::delete(date('d_m_Y_', time()) . 'units/{unit}', [UnitController::class, 'destroy'])->middleware('superadmin');
// 
//

// kategori pertanyaan
Route::resource('question_categoires', QuestionsCategoryController::class)->except('show')->middleware('superadmin');
// 

// login history
// Route::resource('login_history', LoginHistoryController::class)->except('show', 'edit', 'update')->middleware('superadmin');
//
