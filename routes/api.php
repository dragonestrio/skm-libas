<?php

use App\Http\Controllers\API\QuestionController;
use App\Http\Controllers\API\QuestionsCategoryController;
use App\Http\Controllers\API\ReportController;
use App\Http\Controllers\API\UnitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// users
// 

// password_resets
// 

// login histories
// 

// personal_access_tokens
// 

// unit fokus
Route::get(date('d_m_Y_', time()) . 'units', [UnitController::class, 'index']);
Route::get(date('d_m_Y_', time()) . 'units/{unit}', [UnitController::class, 'show']);
Route::post(date('d_m_Y_', time()) . 'units', [UnitController::class, 'store']);
Route::put(date('d_m_Y_', time()) . 'units/{unit}', [UnitController::class, 'update']);
Route::delete(date('d_m_Y_', time()) . 'units/{unit}', [UnitController::class, 'destroy']);
// 

// kategori pertanyaan
Route::get(date('d_m_Y_', time()) . 'questions_categories', [QuestionsCategoryController::class, 'index']);
Route::get(date('d_m_Y_', time()) . 'questions_categories/{questions_category}', [QuestionsCategoryController::class, 'show']);
Route::post(date('d_m_Y_', time()) . 'questions_categories', [QuestionsCategoryController::class, 'store']);
Route::put(date('d_m_Y_', time()) . 'questions_categories/{questions_category}', [QuestionsCategoryController::class, 'update']);
Route::delete(date('d_m_Y_', time()) . 'questions_categories/{questions_category}', [QuestionsCategoryController::class, 'destroy']);
// 

// pertanyaan
Route::get(date('d_m_Y_', time()) . 'questions', [QuestionController::class, 'index']);
Route::get(date('d_m_Y_', time()) . 'questions/{question}', [QuestionController::class, 'show']);
Route::post(date('d_m_Y_', time()) . 'questions', [QuestionController::class, 'store']);
Route::put(date('d_m_Y_', time()) . 'questions/{question}', [QuestionController::class, 'update']);
Route::delete(date('d_m_Y_', time()) . 'questions/{question}', [QuestionController::class, 'destroy']);
// 

// laporan kuesioner
Route::get(date('d_m_Y_', time()) . 'reports', [ReportController::class, 'index']);
Route::get(date('d_m_Y_', time()) . 'reports/{report}', [ReportController::class, 'show']);
Route::post(date('d_m_Y_', time()) . 'reports', [ReportController::class, 'store']);
Route::put(date('d_m_Y_', time()) . 'reports/{report}', [ReportController::class, 'update']);
Route::delete(date('d_m_Y_', time()) . 'reports/{report}', [ReportController::class, 'destroy']);
// 
