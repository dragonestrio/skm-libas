<?php

use App\Http\Controllers\API\QuestionController;
use App\Http\Controllers\API\QuestionsCategoryController;
use App\Http\Controllers\API\ReportController;
use App\Http\Controllers\API\RespondentController;
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

// responden
// Route::get('respondents', [RespondentController::class, 'index']);
// Route::get('respondents/{respondent}', [RespondentController::class, 'show']);
// Route::post('respondents', [RespondentController::class, 'store']);
// Route::put('respondents/{respondent}', [RespondentController::class, 'update']);
// Route::delete('respondents/{respondent}', [RespondentController::class, 'destroy']);
// 

// unit fokus
Route::get('units', [UnitController::class, 'index']);
// Route::get('units/{unit}', [UnitController::class, 'show']);
// Route::post('units', [UnitController::class, 'store']);
// Route::put('units/{unit}', [UnitController::class, 'update']);
// Route::delete('units/{unit}', [UnitController::class, 'destroy']);
// 

// kategori pertanyaan
// Route::get('questions_categories', [QuestionsCategoryController::class, 'index']);
// Route::get('questions_categories/{questions_category}', [QuestionsCategoryController::class, 'show']);
// Route::post('questions_categories', [QuestionsCategoryController::class, 'store']);
// Route::put('questions_categories/{questions_category}', [QuestionsCategoryController::class, 'update']);
// Route::delete('questions_categories/{questions_category}', [QuestionsCategoryController::class, 'destroy']);
// 

// pertanyaan
Route::get('questions', [QuestionController::class, 'index']);
// Route::get('questions/{question}', [QuestionController::class, 'show']);
// Route::post('questions', [QuestionController::class, 'store']);
// Route::put('questions/{question}', [QuestionController::class, 'update']);
// Route::delete('questions/{question}', [QuestionController::class, 'destroy']);
// 

// laporan kuesioner
// Route::get('reports', [ReportController::class, 'index']);
Route::get('respondent/result', [ReportController::class, 'report']);
Route::get('respondent/result/{unit}', [ReportController::class, 'report']);
Route::get('respondent/result/{unit}/{date}', [ReportController::class, 'report']);
Route::post('respondent/add', [ReportController::class, 'store']);
// Route::put('reports/{report}', [ReportController::class, 'update']);
// Route::delete('reports/{report}', [ReportController::class, 'destroy']);
// 
