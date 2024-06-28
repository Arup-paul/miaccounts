<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('q1-report',[ReportController::class,'getQ1Report'])->name('q1-report');
Route::get('q2-report',[ReportController::class,'getQ2Report'])->name('q2-report');
