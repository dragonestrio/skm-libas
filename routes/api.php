<?php

use App\Http\Controllers\API\QuestionController;
use App\Http\Controllers\API\UnitController;
use App\Http\Controllers\API\RespondentController;
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

Route::get('unit', [UnitController::class, "index"]);
Route::get('questions', [QuestionController::class, "index"]);
Route::post('respondent/add', [RespondentController::class, "insert"]);

Route::get('respondent/result', [RespondentController::class, "index"]);
