<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('q1',[ReportController::class,'getQ1Report']);
Route::get('q2',[ReportController::class,'getQ2Report']);
