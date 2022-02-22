<?php

use App\Http\Controllers\SurveyController;
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

Route::get('/', function () { return view('welcome'); });
Route::post('/survey/getCheck',[ SurveyController::class,"getCheck"]);
Route::post('/survey/getSurveyCount',[ SurveyController::class,"getSurveyCount"]);
Route::post('/survey/getSurvey',[ SurveyController::class,"getSurvey"]);
Route::post('/survey/surveyStore',[ SurveyController::class,"surveyStore"]);
Route::post('/survey/getResult',[ SurveyController::class,"getResult"]);


